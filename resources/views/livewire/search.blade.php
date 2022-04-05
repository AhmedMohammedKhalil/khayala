
<section class="">
    <div class="container" style="margin-top: 150px">
        <div class="coming-soon-content">
           
            <form wire:submit.prevent="makeSearch">
                <input type="text" wire:model.lazy="search" id="search" class="email-input" placeholder="search">
                <button type="submit" class="submit-btn">search</button>
            </form>
        </div>
    </div>

    @include('common.all')

    
</section>
