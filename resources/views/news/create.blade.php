@extends('layouts.page')

@section('content')


    <div class="create-news-block">
        <form method="post" action="{{URL::route('create.news.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h3 class="card-title">Добавить новость</h3>
                                        @if(count($errors) > 0)
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="title">Укажите заголовок</label>
                                            <input value="" type="text" name="title" id="title"
                                                   class="form-control" value="{{old('title')}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="text">Основной текст новости</label>
                                            <textarea class="form-control js-editor" type="text"
                                                      name="text" id="text" value="{{old('text')}}"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="img_url">Выбирете изображение</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="img_url"
                                                       accept="image/*,image/jpeg">
                                                <label class="custom-file-label" for="img_url">Выбрать файл</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tags-news">Укажите тэги для новости(<i>формат: #имя тега#</i> не менее 4 символов)</label></option>
                                            </select>
                                            <input name="tags-news" id="tags" value="" />
                                        </div>

                                    </div>
                                </div>
                                <button class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>

@endsection
