<form class="bg-white shadow-lg rounded-4 p-5 my-5 border" wire:submit="save">

    <!-- Messaggio di successo -->
    <x-success />

    <h3 class="text-center mb-4">{{__('ui.create_new')}}</h3>

    <!-- Titolo -->
    <div class="mb-3">
        <label for="title" class="form-label fw-bold">{{__('ui.title')}}:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.blur="title">
        @error('title')
            <p class="small fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Descrizione -->
    <div class="mb-3">
        <label for="description" class="form-label fw-bold">{{__('ui.description')}}:</label>
        <textarea id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" wire:model.blur="description"></textarea>
        @error('description')
            <p class="small fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Prezzo -->
    <div class="mb-3">
        <label for="price" class="form-label fw-bold">{{__('ui.price')}}:</label>
        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.blur="price">
        @error('price')
            <p class="small fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Categoria -->
    <div class="mb-3">
        <label for="category_select" class="form-label fw-bold">{{__('ui.category')}}:</label>
        <select id="category_select" class="form-select @error('category_select') is-invalid @enderror" wire:model.blur="category">
            <option value="" selected>{{__('ui.select_category')}}a</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <p class="small fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- Pulsante di invio -->
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-dark px-4 py-2 fw-bold rounded-3 shadow-sm">
            <i class="bi bi-check-circle"></i> {{__('ui.create')}}
        </button>
    </div>

</form>
