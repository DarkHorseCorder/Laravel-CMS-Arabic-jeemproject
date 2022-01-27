@extends('layouts.admin')

@section('content')

    @include('partials.backend.admin-breadcrum')

    <style>
        .box-a  {
            width: 100%;
            height: 17%;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Front Page (AR)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Front Page (EN)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Front Page (DE)</a>
                </li>
            </ul><!-- Tab panes -->
            <div class="card p-2 tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                    <div class="fron-page-ar">
                        <div class="row mb-2">
                            <div class="offset-2 col-8">
                                <div class="img-square-wrapper text-center mb-2 ">
                                    <img class="w-100" src="http://via.placeholder.com/920x300" alt="Card image cap">
                                </div>
                                <select name="sections" class="form-control select2">
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8 ">
                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8">
                                <div class="img-square-wrapper text-center mb-2 ">
                                    <img class="w-100" src="http://via.placeholder.com/920x300" alt="Card image cap">
                                </div>
                                <select name="sections" class="form-control select2">
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8 ">
                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="img-square-wrapper text-center mb-2">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8 ">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/50x50" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <div class="img-square-wrapper text-center mb-2">
                                            <img class="w-100" src="http://via.placeholder.com/50x50" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <div class="img-square-wrapper text-center mb-2">
                                            <img class="w-100" src="http://via.placeholder.com/50x50" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tabs-2" role="tabpanel">
                    <div class="fron-page-en">
                        <div class="row mb-2">
                            <div class="offset-2 col-8">
                                <div class="img-square-wrapper text-center mb-2 ">
                                    <img class="w-100" src="http://via.placeholder.com/920x300" alt="Card image cap">
                                </div>
                                <select name="sections" class="form-control select2">
                                    <option value="#section-name"> Post title 2</option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8 ">
                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8">
                                <div class="img-square-wrapper text-center mb-2 ">
                                    <img class="w-100" src="http://via.placeholder.com/920x300" alt="Card image cap">
                                </div>
                                <select name="sections" class="form-control select2">
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8 ">
                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="img-square-wrapper text-center mb-2">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8 ">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/50x50" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <div class="img-square-wrapper text-center mb-2">
                                            <img class="w-100" src="http://via.placeholder.com/50x50" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <div class="img-square-wrapper text-center mb-2">
                                            <img class="w-100" src="http://via.placeholder.com/50x50" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tabs-3" role="tabpanel">
                    <div class="fron-page-de">
                        <div class="row mb-2">
                            <div class="offset-2 col-8">
                                <div class="img-square-wrapper text-center mb-2 ">
                                    <img class="w-100" src="http://via.placeholder.com/920x300" alt="Card image cap">
                                </div>
                                <select name="sections" class="form-control select2">
                                    <option value="#section-name"> Post title 3</option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8 ">
                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8">
                                <div class="img-square-wrapper text-center mb-2 ">
                                    <img class="w-100" src="http://via.placeholder.com/920x300" alt="Card image cap">
                                </div>
                                <select name="sections" class="form-control select2">
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                    <option value="#section-name"> Post title </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8 ">
                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="img-square-wrapper text-center mb-2">
                                            <img class="w-100" src="http://via.placeholder.com/150x100" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-2 col-8 ">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="img-square-wrapper text-center mb-2 ">
                                            <img class="w-100" src="http://via.placeholder.com/50x50" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <div class="img-square-wrapper text-center mb-2">
                                            <img class="w-100" src="http://via.placeholder.com/50x50" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <div class="img-square-wrapper text-center mb-2">
                                            <img class="w-100" src="http://via.placeholder.com/50x50" alt="Card image cap">
                                        </div>
                                        <select name="sections" class="form-control select2">
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                            <option value="#section-name"> Post title </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
