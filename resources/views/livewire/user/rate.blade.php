<form wire:submit.prevent='makeRate'>
    <div class="rating">
        <span class=" d-inline">تقييم : </span>
        <input type="number" wire:model='rate' name="rate" id="rate" min="1" value="1" max="5" title="تقييم" >
    </div>
    <button class="make-rate" type="submit">تقييم</button>
</form>
