<form class="mt-5" action="" method="post" enctype="multipart/form-data">
    @csrf
    @method($post->id ? "PATCH" : "POST")
    <div class="form-group m-3">
        <label class="fw-bold m-1" for="title">Titre</label>
        <input type="text" class="form-control @error("title") is-invalid @enderror" id="title" name="title"
               value="{{ old('title', $post->title) }}">
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group m-3">
        <label class="fw-bold m-1" for="slug">Slug</label>
        <input type="text" class="form-control @error("slug") is-invalid" id="slug" @enderror name="slug"
               value="{{ old('slug', $post->slug) }}">
        @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group m-3">
        <label class="fw-bold m-1" for="content">Contenu</label>
        <textarea id="content" name="content" class="form-control @error("slug") is-invalid" ols="30"
                  rows="10" @enderror" >{{ old('content', $post->content) }}</textarea>
        @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group m-3">
        <label class="fw-bold m-1" for="image">Fichier</label>
        <input type="file" class="form-control @error("image") is-invalid @enderror" id="image" name="image">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group m-3">
        <label class="fw-bold m-1" for="category">Catégorie</label>
        <select class="form-control" id="category" name="category_id">
            <option value="">Sélectionner une catégories</option>
            @foreach($categories as $category)
                <option @selected(old('category_id', $post->category_id) == $category->id)  value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    @php
        $tagsIds = $post->tags->pluck('id');
    @endphp
    <div class="form-group m-3">
        <label class="fw-bold m-1" for="tag">Tags</label>
        <select class="form-control" id="tag" name="tags[]" multiple>
            @foreach($tags as $tag)
                <option @selected($tagsIds->contains($tag->id)) value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        @error('tags')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="text-center m-3">
        <button class="btn btn-primary w-25">
            @if($post->id)
                Modifier
            @else
                Créer
            @endif
        </button>
    </div>
</form>