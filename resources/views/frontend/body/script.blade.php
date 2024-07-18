{{-- Start WishList- --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function addToWishList(course_id) {
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/add-to-wishlist/" + course_id,
            success: function(data) {
                //console.log(data);
                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 6000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })
                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }
                // End Message
            }
        })
    }
</script>
{{-- End WishList- --}}


{{-- ---Display WishList Start --}}
<script type="text/javascript">
    function wishlist() {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/get-wishlist-course/",
            success: function(response) {

            }
        })
    }
</script>

{{-- ---Display WishList End --}}


{{-- /// Start Add To Cart  // --}}

<script type="text/javascript">
    function addToCart(courseId, courseName, slug) {
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                course_name: courseName,
                course_name_slug: slug,
            },
            url: "/cart/data/store/" + courseId,
            success: function(data) {
                miniCart();
                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 6000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })
                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }
                // End Message
            }
        })
    }
</script>
{{-- /// End Add To Cart  // --}}


{{-- /// Start Mini Cart  // --}}
<script type="text/javascript">
    function miniCart() {
        $.ajax({
            type: 'GET',
            url: '/course/mini/cart',
            dataType: 'json',
            success: function(response) {
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                var miniCart = ""
                $.each(response.carts, function(key, value) {
                    miniCart += `<li class="media media-card">
                            <a href="/course/details/${value.id}/${value.options.slug}" class="media-img">
                                <img src="/${value.options.image}" alt="Cart image">
                            </a>
                            <div class="media-body">
                                <h5><a href="/course/details/${value.id}/${value.options.slug}"> ${value.name}</a></h5>

                                 <span class="d-block fs-14">$${value.price}</span>
                                    <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="la la-times"></i> </a>
                            </div>
                        </li>
                        `
                });
                $('#miniCart').html(miniCart);
            }
        })
    }
    miniCart();

    // Mini Cart Remove Start
    function miniCartRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '/minicart/course/remove/' + rowId,
            dataType: 'json',
            success: function(data) {
                miniCart();
                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })
                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }
                // End Message
            }
        })
    }
    // End Mini Cart Remove
</script>
{{-- /// End Mini Cart // --}}
</script>
{{-- /// End Mini Cart // --}}



 {{-- /// Start MyCart  // --}}
 <script type="text/javascript">
    function cart(){
        $.ajax({
            type: 'GET',
            url: '/get-cart-course',
            dataType: 'json',
            success:function(response){
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                var rows = ""
                $.each(response.carts, function(key,value){
                    rows += `
                    <tr>
                    <th scope="row">
                        <div class="media media-card">
                            <a href="course-details.html" class="media-img mr-0">
                                <img src="/${value.options.image}" alt="Cart image">
                            </a>
                        </div>
                    </th>
                    <td>
                        <a href="/course/details/${value.id}/${value.options.slug}" class="text-black font-weight-semi-bold">${value.name}</a>

                    </td>
                    <td>
                        <ul class="generic-list-item font-weight-semi-bold">
                            <li class="text-black lh-18">$${value.price}</li>

                        </ul>
                    </td>

                    <td>
                        <button type="button" id="${value.rowId}" onclick="cartRemove(this.id)" class="icon-element icon-element-xs shadow-sm border-0" data-toggle="tooltip" data-placement="top" title="Remove">
                            <i class="la la-times"></i>
                        </button>
                    </td>
                </tr>
                `
                });
                $('#cartPage').html(rows);
            }
        })
    }
    cart();
</script>
{{-- /// End MyCart // --}}
<script>
// My Cart Remove Start
function cartRemove(rowId){
   $.ajax({
       type: 'GET',
       url: '/cart-remove/'+rowId,
       dataType: 'json',
       success:function(data){
       miniCart();
       cart();
// Start Message
const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000
       })
       if ($.isEmptyObject(data.error)) {

               Toast.fire({
               type: 'success',
               icon: 'success',
               title: data.success,
               })
       }else{

      Toast.fire({
               type: 'error',
               icon: 'error',
               title: data.error,
               })
           }
         // End Message
       }
   })
}
// End My Cart Remove
</script>
{{-- /// End MyCart // --}}
