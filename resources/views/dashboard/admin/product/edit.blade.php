@extends('dashboard.layouts.master')
@section('title')
Edit Product - @parent
@endsection
@section('header')
@include('dashboard.layouts.header')
@endsection
@section('sidebar')
@include('dashboard.includes.nav-admin')
@endsection
<style type="text/css">
   .error{
        color: red
   }
   .m-portlet.m-portlet--full-height .m-portlet__body {
     height:auto !important;
   }
   .m-portlet.m-portlet--full-height{
        height:auto !important;
   }
   .m-portlet .m-portlet__foot {
        padding: 2.1rem 3.2rem !important;
    }
</style>
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper portlet-page">
   
   <!-- END: Subheader -->
   <div class="m-content ">
      @include('dashboard.messages.all')
      <!--Begin::Section-->
      <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
         <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
               <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary"
                  role="tablist">
                  <li class="nav-item m-tabs__item">
                     <a class="nav-link m-tabs__link active"
                        data-toggle="tab" href="#m_user_profile_tab_1"
                        role="tab">
                     <i class="flaticon-share m--hide"></i>
                     Edit product
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="tab-content">
            <form class="m-form m-form--fit m-form--label-align-right" action="#" enctype="multipart/form-data" method="post">
            <div class="m-portlet__body">
               <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                   Name
                  </label>
                  <div class="col-7">
                     <input type="text" class="form-control m-input" name="name" value="{{$product->name}}" id="name">
                  </div>
               </div>
               <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                    Quantity
                  </label>
                  <div class="col-7">
                      <input type="number" class="form-control m-input" name="quantity" value="{{$product->quantity}}" id="quantity">
                  </div>
               </div>
               <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                     Description
                  </label>
                  <div class="col-7">
                     <input type="textarea" class="form-control m-input" row="3" name="description" value="{{$product->description}}" id="description">
                  </div>
               </div>
               <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                  Price 
                  </label>
                  <div class="col-7">
                  <input type="number" class="form-control m-input" name="price" value="{{$product->price}}" id="price">
                  </div>
               </div>
               <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                   category
                  </label>
                  <div class="col-7">
                     <select  class="form-control m-input" name="category" id="category">
                            <option value="">--select a category--</option>
                            <option value="electronic" {{$product->category == "electronic" ? 'selected' : ''}}>Electronic</option>
                            <option value="clothes" {{$product->category == "clothes" ? 'selected' : ''}}>Clothes</option>
                            <option value="home" {{$product->category == "home" ? 'selected' : ''}}>Home</option>
                            <option value="beauty" {{$product->category == "beauty" ? 'selected' : ''}}>Beauty</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
               <div class="m-form__actions">
                  <div class="row">
                     <div class="col-7">
                        <button type="submit" class="btn btn-brand m-btn m-btn--air m-btn--custom" id="submit">
                        Save changes
                        </button>
                        &nbsp;&nbsp;
                        <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                        Cancel
                        </button>
                     </div>
                  </div>
               </div>
            </div>
            </form>
        </div>
      </div>
   </div>
   <!--End::Section-->
</div>
@endsection
@section('footer')
@include('dashboard.layouts.footer')
@endsection
@section('page_scripts')
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
   const productId = "{{$product->id}}";
   function getWordCount(wordString) {
     var words = wordString.split(" ");
     words = words.filter(function(words) { 
       return words.length > 0
     }).length;
     return words;
   }
   
   //add the custom validation method
   jQuery.validator.addMethod("wordCount",
      function(value, element, params) {
         var count = getWordCount(value);
         if(count >= params[0]) {
            return true;
         }
      },
      jQuery.validator.format("A minimum of {0} words is required here.")
   );
   
   $( "#myform" ).validate({
       rules: {
           about: {
               required: true,
           },
           website: {
             url: true
           },
           twitter: {
             url: true
           },
           facebook: {
             url: true
           },
           instagram: {
             url: true
           }
       },
       messages: {
           website: {
               url: "You have entered an invalid URL, please copy and enter complete url."
           },
           twitter: {
               url: "You have entered an invalid URL, please copy and enter complete url."
           },
           facebook: {
               url: "You have entered an invalid URL, please copy and enter complete url."
           },
           instagram: {
               url: "You have entered an invalid URL, please copy and enter complete url."        },
           about: {
               required: "Please enter about you in above field"
           }
       }
   });
   function getProductDetails() {
     const productDetails = {
         _token: '{{ csrf_token() }}',
         name: $('#name').val(),
         price: $('#price').val(),
         description: $('#description').val(),
         category: $('#category').val(),
         quantity: $('#quantity').val(),
         image: $('#image').val()

     } 
     return productDetails;
   }
   $('body').on('click', '#submit', function (e) {
                e.preventDefault();
                console.log(getProductDetails())
                var _this = $(this);
                swal({
                    text: "Are you sure you want to Update this Product?",
                    icon: "info",
                    buttons: true,

                }).then(willRestore => {
                  if (willRestore) {
                        $.ajax({
                            type: 'POST',
                            url: `http://127.0.0.1:8000/api/product/${productId}/update`,
                            data: getProductDetails(),
                            dataType: 'JSON',
                            success: function (data) {
                                if (data.status) {
                                    swal({
                                        text: data.message,
                                        icon: 'success',
                                    });
                                } else {
                                    swal({
                                        text: data.message,
                                        icon: 'error',
                                    });
                                }
                            },
                            error: function (data) {
                                swal({
                                    text: data.message,
                                    icon: 'error',
                                });
                            }

                        });
                    }
                });
            })
</script>
@endsection