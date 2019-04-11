<div class="modal fade" id="productModal{{$data->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" src="{{asset('assets/img/barang/' . $data->cover)}}">
                                </div>
                            </div>
                            <!-- end product images -->

                            <div class="product-info">
                                <h1>{{$data->title}}</h1>
                                <div class="rating__and__review">


                                </div>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">Rp.{{$data->price}}</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    {!! $data->description !!}
                                </div>

                                <div class="addtocart-btn">
                                    <a href="{{url('add-cart',$data->id)}}">Add to cart</a>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
