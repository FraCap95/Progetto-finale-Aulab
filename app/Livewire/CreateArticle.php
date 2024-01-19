<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Symfony\Contracts\Service\Attribute\Required;

class CreateArticle extends Component
{
    
    use WithFileUploads;
    
    
    public $name;
    public $description;
    public $price;
    public $category;
    public $temporary_images;
    public $images = [];
    public $image; 
    public $article;
    
    
    protected $rules = [
        'name' => "required|min:3",
        'description' => "required",
        'category' => "required",
        'price' => "required",
        'images.*'=>'image|max:1024',
        'temporary_images.*'=> 'image|max:1024',
    ];
    
    protected $messages = [
        
        'name.required' => "Il titolo è obbligatorio",
        'name.min' => "Il titolo deve essere lungo almeno 3 caratteri",
        'description.required' => "La descrizione è obbligatoria",
        'category.required' => "La categoria è obbligatoria",
        'price.required' => "Il prezzo  è obbligatorio",
        'temporary_images.required'=>'L\'immagine è richiesta ',
        'temporary_images.*.image'=>'I file devono essere immagini',
        'temporary_images.*.max'=>'L\'immagine dev\'essere massimo di 1MB',
        'images.image'=> 'L\'immagine dev\'essere un\'immagine ',
        'images.max'=>'L\'immagine dev\'essere massimo di un 1MB',
        
        
    ];
    
    public function updatedTemporaryImages (){
        
        
        if ($this->validate([
            'temporary_images.*'=>'image|max:1024',
            ])) {
                foreach ($this->temporary_images as $image) {
                    $this->images[] = $image ;
                }
            }
        }
        
        public function removeImage($key)
        {
            if (in_array($key, array_keys($this->images))) {
                unset($this->images[$key]);
            }
        }
        
        
        public function updated($propertyName)
        {
            $this->validateOnly($propertyName);
        }
        
        
        public function store()
        {
            
            $this->validate();
            
            $this->article = Category::find($this->category)->articles()->create($this->validate());
            if(count($this->images)) {
                foreach ($this->images as $image) {
                    // $this->article->images()->create(['path' =>$image->store ('images' , 'public')]);
                    $newFileName = "articles/{$this->article->id}";
                    $newImage = $this->article->images()->create(['path'=>$image->store($newFileName,'public')]);
                    
                    RemoveFaces::withChain([
                        (new ResizeImage($newImage->path, 400, 300)),
                        (new GoogleVisionSafeSearch($newImage->id)),
                        (new GoogleVisionLabelImage($newImage->id))
                    ])->dispatch($newImage->id);
                        
                    }
                    File::deleteDirectory(storage_path('/app/livewire-tmp'));
                }
                
                
                // $category = Category::find($this->category);
                
                // $category->articles()->create([
                    
                    //     'name' => $this->name,
                    //     'description' => $this->description,
                    //     'price' => $this->price,
                    //     'user_id' => Auth::user()->id,
                    
                    // ]);
                    
                    session()->flash('message', 'Articolo inserito con successo, sarà pubblicato dopo la revisione!');
                    
                    
                    $this->cleanForm();
                }
                
                public function cleanForm()
                {
                    $this->name = '';
                    $this->description = '';
                    $this->price = '';
                    $this->category = '';
                    $this->image = '';
                    $this->images = [];
                    $this->temporary_images = [];
                }
                
                public function render()
                {
                    return view('livewire.create-article');
                }
            }
