<div>
    {{$arr['name']}}
    {{$number}}

    <input type="text" wire:model.lazy="arr.name">

    <input type="submit" value="Click" wire:click='increase(5)'>
</div>
