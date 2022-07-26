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
    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-8 p-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier produit</h4>
                    </div>
                    <div class="card-body">
                        <form action="/product/{{ $product->id }}" method="post" style="display:block; marging:auto">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="form-label p-2" for="image">image</label>
                                        <div class="m-2">
                                            <img id="preview-image" src="/storage/{{$product->image}}" alt="product image" width="200" style="max-height: 250px;">
                                        </div>

                                        <input  class="form-control p-2" type="file"id="image" name="image" accept="image/*">
                                        <span class="text-danger">@error('image'){{'Invalide'}}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="m-2" class="form-label p-2" for="name">Nom</label>
                                        <input  class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
                                        <span class="text-danger">@error('name'){{'Invalide'}}@enderror</span>
                                    </div>
                                    <div>
                                        <label class="m-2" class="form-label p-2" for="description">Description</label>
                                        <input  class="form-control" type="text" name="description" id="description" value="{{ $product->description }}">
                                        <span class="text-danger">@error('description'){{'Invalide'}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="m-2" for="price">Prix</label>
                                        <input  class="form-control p-2" type="number" name="price" id="price"  value="{{ $product->price }}">
                                        <span class="text-danger">@error('price'){{'Invalide'}}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="m-2" for="category">Catégorie</label>
                                        <select  class="form-control p-2" name="category" id="category" value='{{$product->category_id}}'>
                                            @foreach($categories as $category)
                                                @if($category->id === $product->category_id)
                                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                                @else
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('category'){{'Invalide'}}@enderror</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="m-2" for="quantity">Quantité</label>
                                        <input  class="form-control p-2" type="number" name="quantity" id="quantity"  value="{{ $product->quantity }}">
                                        <span class="text-danger">@error('quantity'){{'Invalide'}}@enderror</span>

                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="m-2" for="quantity_type">unités</label>
                                        <select  class="form-control p-2" name="quantity_type" id="quantity_type" value="{{ $product->quantity_type }}">
                                            <option value="unité(s)">unité(s)</option>
                                            <option value="t (tonnes)">T (tonnes)</option>
                                            <option value="kg">Kg</option>
                                            <option value="g">G</option>
                                            <option value="L">L</option>
                                        </select>
                                        <span class="text-danger">@error('quantity_type'){{'Invalide'}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end m-2">
                                <input class="bb-pr ps-2 pe-2" type="submit" value="Enregistrer">
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
