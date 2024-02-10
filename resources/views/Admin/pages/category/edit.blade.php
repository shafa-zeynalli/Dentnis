@extends('Layouts.admin')

@section('content')
    <h2>Edit Category Item</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.category.update')}}" method="POST" enctype="multipart/form-data">
                {{--                {{ isset($model) ? route($routeName.'.update', $model->id) : route($routeName.'.store') }}--}}
               @method('PUT')
                @csrf
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            @foreach(config('app.languages') as $lang)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first ? 'active show' : ''}} @error("$lang.title") text-danger @enderror"
                                       id="custom-tabs-one-home-tab" data-bs-toggle="pill" href="#tab-{{$lang}}"
                                       role="tab"
                                       aria-controls="custom-tabs-one-home" aria-selected="true">{{$lang}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">

                            @foreach(config('app.languages') as $index => $lang)
                                @php
                                     $categoryTranslation = $category->translations
                                        ->where('language.lang', $lang)->first();
//                                    dd($categoryTranslation);
                                @endphp
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="tab-{{$lang}}"
                                     role="tabpanel"
                                     aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <label for="{{$lang}}-title">Title</label>
                                        <input type="text" placeholder="Title Name" name="{{$lang}}[title]"
                                               value="{{ $categoryTranslation ? $categoryTranslation->name : '' }}"
                                               class="form-control" id="{{$lang}}-title">
                                        @error("$lang.title")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <input type="hidden" name="category_id" value="{{$category->id}}">
                <button class="btn btn-success my-4">Edit</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
             var tabs = new bootstrap.Tab(document.querySelector('#custom-tabs-one-home-tab'));
            tabs.show();

             @foreach(config('app.languages') as $index => $lang)
            new Summernote($('#summernote{{$index}}'), {
                placeholder: 'desc{{$lang}}',
                height: 200,
             });
            @endforeach
        });
    </script>
@endsection
