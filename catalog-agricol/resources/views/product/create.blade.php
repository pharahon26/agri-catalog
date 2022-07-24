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
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col p-3">
                <div class="card">
                    <div class="card-header">
                        <h2>Nouveau produit</h2>
                    </div>
                    <div class="card-body">
                        <form action="/product" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label class="form-label p-2" for="image">image</label>
                                    <br><span>@error('image'){{$message}}@enderror</span>  </br>
                                    <img id="preview-image" src="#" alt="preview image" width="200" style="max-height: 250px;">
                                    <input class="form-control" type="file"id="image" name="image" accept="image/*">
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="form-label p-2" for="name">Nom</label>
                                        <input class="form-control" type="text" name="name" id="name">
                                        <br><span>@error('name'){{$message}}@enderror</span>  </br>
                                    </div>
                                    <div>
                                        <label class="form-label p-2" for="description">Description</label>
                                        <input  class="form-control" type="text" name="description" id="description">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label p-2" for="price">Prix</label>
                                    <input class="form-control" type="number" name="price" id="price">
                                    <br><span>@error('price'){{$message}}@enderror</span>  </br>
                                </div>
                                <div class="col">
                                    <label class="form-label p-2" for="category">Catégorie</label>
                                    <select class="form-control" name="category" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <br><span>@error('category'){{$message}}@enderror</span>  </br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label p-2" for="quantity">Quantité</label>
                                    <input class="form-control" type="number" name="quantity" id="quantity">
                                    <br><span>@error('quantity'){{$message}}@enderror</span>  </br>
                                </div>
                                <div class="col">
                                    <label class="form-label p-2" for="quantity_type">unités</label>
                                    <select class="form-control"  name="quantity_type" id="quantity_type">
                                        <option value="unité">unité(s)</option>
                                        <option value="kg">kg</option>
                                        <option value="g">g</option>
                                    </select>
                                    <br><span>@error('quantity_type'){{$message}}@enderror</span>  </br>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Enregistrer">
                            </div>

                        </form>
                    </div>
                </div>





            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
