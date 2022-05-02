
<section class="">
    <div class="container" style="margin-top: 150px">
        <div class="coming-soon-content">

            <form wire:submit.prevent="makeSearch">
                <button type="submit" class="submit-btn">بحث</button>
                <input type="text" wire:model.lazy="search" id="search" class="email-input" placeholder="بحث">
            </form>
        </div>
    </div>

    @include('common.all')


</section>
