@extends('layout.layout')

@section('content')
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
                        <h2>Modifier produit</h2>
                    </div>
                    <div class="card-body">
                        <form action="/product/{{ $product->id }}" method="post" style="display:block; marging:auto">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="form-label p-2" for="image">image</label>
                                        <div class="jus">
                                            <img id="preview-image" src="/storage/{{$product->image}}" alt="product image" width="200" style="max-height: 250px;">
                                        </div>

                                        <input  class="form-control p-2" type="file"id="image" name="image" accept="image/*">
                                        <input type="image" src="#" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="form-label p-2" for="name">Nom</label>
                                        <input  class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
                                    </div>
                                    <div>
                                        <label class="form-label p-2" for="description">Description</label>
                                        <input  class="form-control" type="text" name="description" id="description" value="{{ $product->description }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label for="price">Prix</label>
                                        <input  class="form-control p-2" type="number" name="price" id="price"  value="{{ $product->price }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label for="category">Catégorie</label>
                                        <select  class="form-control p-2" name="category" id="category" value='{{$product->category_id}}'>
                                            @foreach($categories as $category)
                                                @if($category->id === $product->category_id)
                                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                                @else
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label for="quantity">Quantité</label>
                                        <input  class="form-control p-2" type="number" name="quantity" id="quantity"  value="{{ $product->quantity }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label for="quantity_type">unités</label>
                                        <select  class="form-control p-2" name="quantity_type" id="quantity_type" value="{{ $product->quantity_type }}">
                                            <option value="unité">unité</option>
                                            <option value="kg">kg</option>
                                            <option value="g">g</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input class="m-3" type="submit" value="edit product">
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
