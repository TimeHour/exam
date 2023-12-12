@extends('partials.layout')

@section('content')
    <div class="container mx-auto w-1/2">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">The name of the burger</span>

                        </label>
                        <input name="title" type="text" placeholder="Name" class="input input-bordered w-full @error('title') input-error @enderror"/>
                        @error('title')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>

                            </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea name="body" class="textarea textarea-bordered @error('kirjeldus') textarea-error @enderror" placeholder="description"></textarea>
                        @error('body')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control">
                    <label class="label">
                            <span class="label-text">Price</span>
                        </label>
                        <input class="input input-bordered w-half" type="number" name="Hind" id="Hind" placeholder="Price"/>
                            </div>

                    <div class="form-control">
                    <label class="label">
                        <span class="label-text">Vegan</span>
                        </label>
                        <input type="hidden" name="vegan" value="0"/>
                        <input type="checkbox" class="checkbox" name="vegan"/>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Gluten free</span>
                        </label>
                        <input type="hidden" name="gluteeni_vaba" value="0"/>
                        <input type="checkbox" class="checkbox" name="gluteeni_vaba"/>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Vegetarian</span>
                        </label>
                        <input type="hidden" name="taimetoitlasele" value="0"/>
                        <input type="checkbox" class="checkbox" name="taimetoitlasele" @if($article->taimetoitlasele > 0) checked="checked" @else ''@endif/>
                </div>

                <div class="form-control w-full">
                    <label class="label">
                            <span class="label-text">spicy</span>
                        </label>
                        <input value="{{$article->teravus}}" class="input input-bordered w-half" type="number" name="teravus" min="0" max="5" />
                            </div>

                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Images</span>
                        </label>
                        <input name="images[]" type="file" multiple class="file-input input-bordered w-full @error('image.*') input-error @enderror"/>
                        @error('image.*')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                    </div>
                    <input type="submit" value="Create" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>
@endsection
