@extends('layouts.admin')

@section('styles')
    <style>
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label class="required" for="image">Image</label>
                </div>
                <div class="form-group row py-4 bg-dark">
                    <div class="col-lg-6 mx-auto">
                        <!-- Upload image input-->
                        <div class="input-group mb-3 px-2 py-2 rounded-pill {{ $errors->has('image') ? 'bg-danger' : 'bg-white' }}  shadow-sm">
                            <input id="upload" name="image" type="file" onchange="readURL(this);" class="form-control border-0">
                            <label id="upload-label" for="upload" class="font-weight-light {{ $errors->has('image') ? 'text-white' : 'text-muted' }}">Choose file</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"><i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted ">Choose file</small></label>
                            </div>
                        </div>
                        @if ($errors->has('image'))
                            <p class="text-danger text-center">{{ $errors->first('image') }}</p>
                        @else
                            <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                        @endif
                        <!-- Uploaded image area-->
                        <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="required" for="author">Author </label>
                    <select class="form-control select2 {{ $errors->has('author_id') ? 'is-invalid' : '' }}" name="author_id" id="author">
                        @foreach ($authors as $author)
                            <option value="{{$author->id }}" {{ old('author_id', $post->author->id) ? 'selected' : '' }}>
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                   {{ '('.$localeCode.') '. $author->getTranslation('slug', $localeCode) }}
                                @endforeach
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="required" for="categories">Categories</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple >
                        @foreach($categories as $id => $category)
                            <option value="{{$category->id }}" {{ in_array($id, old('categories', [])) || $post->categories->contains($id) ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('categories'))
                        <span class="text-danger">{{ $errors->first('categories') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="tags">Tags</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple >
                        @foreach($tags as $id => $tag)
                            <option value="{{$tag->id }}" {{ in_array($id, old('tags', [])) || $post->tags->contains($id) ? 'selected' : '' }}>
                                {{ $tag->title }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('tags'))
                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                    @endif
                </div>

                @foreach(config('translatable.locales') as $locale)
                    <div class="border p-3 my-2">
                            <div class="form-group">
                                <label class="required" for="title_{{ $locale }}">Title ({{ strtoupper($locale) }}) </label>
                                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title[{{ $locale }}]" id="title_{{ $locale }}" value="{{ old('title.'.$locale, $post->getTranslation('title', $locale)) }}" >

                                @if($errors->has('title.*'))
                                    <p class="text-danger">{{ $errors->first('title.'.$locale) }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required" for="body_{{ $locale }}"> Body ({{ strtoupper($locale) }}) </label>
                                <textarea rows="2" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body[{{ $locale }}]" id="body_{{ $locale }}">{{ old('body.'.$locale,  $post->getTranslation('body', $locale)) }}</textarea>
                                @if($errors->has('body.*'))
                                    <p class="text-danger">{{ $errors->first('body.'.$locale) }}</p>
                                @endif
                            </div>
                        </div>

                @endforeach
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="action" value="save" >
                        {{ trans('global.save') }}
                    </button>
                    @if($post->is_published == 0)
                    <button type="submit" class="btn btn-info" name="action" value="publish" >
                        {{ trans('global.publish') }}
                    </button>
                    @endif
                    <button class="btn btn-danger">
                        {{ trans('global.cancel') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
         $(document).ready(function() {

            /*  ==========================================
                SHOW UPLOADED IMAGE
            * ========================================== */
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imageResult')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(function () {
                $('#upload').on('change', function () {
                    readURL(input);
                });
            });
            /*  ==========================================
                SHOW UPLOADED IMAGE NAME
            * ========================================== */
            var input = document.getElementById( 'upload' );
            var infoArea = document.getElementById( 'upload-label' );

            input.addEventListener( 'change', showFileName );
            function showFileName( event ) {
                var input = event.srcElement;
                var fileName = input.files[0].name;
                infoArea.textContent = 'File name: ' + fileName;
            }


        });
    </script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script>
        @foreach(config('translatable.locales') as $locale)
            CKEDITOR.replace('body_{{ $locale }}', {
                extraPlugins: 'footnotes',
                
                footnotesPrefix: 'a',
                footnotesDisableHeader: true, // Defaults to false
                footnotesHeaderEls: ['<p><b>', '</b></p>'], // Defaults to ['<h2>', '</h2>']
                footnotesTitle: 'References', // Defaults to 'Footnotes'
                footnotesDialogEditorExtraConfig: { height: 150 }, // Will be merged with the default options for the footnote editor

                language: '{{ $locale }}',
                editorplaceholder: 'Start typing here...',
                removeButtons: 'PasteFromWord'
            });
        @endforeach
     </script>
@endsection
