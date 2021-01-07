<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostComponent extends Component
{
    public $post_title;
    public $post_detail;
    public $post_author;

    public function mount($title,$detail,$author){
        $this->post_title=$title;
        $this->post_detail=$detail;
        $this->post_author=$author;
    }


    public function render()
    {
        return view('livewire.post-component')->with([
            'title'=>$this->post_title,
            'detail'=>$this->post_detail,
            'author'=>$this->post_author,
        ]);
    }
}
