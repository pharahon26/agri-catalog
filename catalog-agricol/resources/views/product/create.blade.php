@extends('layout.layout')

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function (e) {


            $('#image').change(function(){

                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });

        });

    </script>
    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-8 p-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Nouveau produit</h4>
                    </div>
                    <div class="card-body">
                        <form action="/product" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label class="form-label p-2" for="image">image</label>
                                    <span>@error('image'){{$message}}@enderror</span>
                                    <img id="preview-image" src="#" alt="preview image" width="200" style="max-height: 250px;">
                                    <input class="form-control" type="file"id="image" name="image" accept="image/*">
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="form-label m-2 p-2" for="name">Nom</label>
                                        <input class="form-control" type="text" name="name" id="name">
                                        <span>@error('name'){{$message}}@enderror</span>
                                    </div>
                                    <div>
                                        <label class="form-label p-2" for="description">Description</label>
                                        <input  class="form-control" type="text" name="description" id="description">
                                        <span>@error('description'){{$message}}@enderror</span>

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label p-2 m-2" for="price">Prix</label>
                                    <input class="form-control" type="number" name="price" id="price">
                                    <span>@error('price'){{$message}}@enderror</span>
                                </div>
                                <div class="col">
                                    <label class="form-label p-2 m-2" for="category">Catégorie</label>
                                    <select class="form-control" name="category" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <span>@error('category'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label p-2 m-2" for="quantity">Quantité</label>
                                    <input class="form-control" type="number" name="quantity" id="quantity">
                                    <span>@error('quantity'){{$message}}@enderror</span>
                                </div>
                                <div class="col">
                                    <label class="form-label p-2 m-2" for="quantity_type">unités</label>
                                    <select class="form-control"  name="quantity_type" id="quantity_type">
                                        <option value="unité(s)">unité(s)</option>
                                        <option value="t (tonnes)">T (tonnes)</option>
                                        <option value="kg">Kg</option>
                                        <option value="g">G</option>
                                        <option value="L">L</option>
                                    </select>
                                    <span>@error('quantity_type'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end m-2">
                                <input class="m-2 bb-pr ps-2 pe-2" type="submit" value="Enregistrer">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
