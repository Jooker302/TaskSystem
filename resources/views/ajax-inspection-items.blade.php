<div class="form-group">
    <label for="exampleInputPassword1">Inspection Items</label>
    <div >
        @isset($success)
            <script>
                alert('Added');
            </script>
        @endisset
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        {{-- @php
            dd($task_id);
        @endphp --}}
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="task_id" id="task_id" value="{{$task_id}}">
        <input type="text" name="inspection_items" class="form-control" id="inspection_items" placeholder="Inspection Items" style="width: 60%; display:inline">
        <br><br>
        <input type="file" name="inspection_image" class="form-control" id="inspection_image" placeholder="Inspection Items" style="width: 60%; display:inline">
        <br><br>
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Start Date" style="width: 60%; display:inline">
        <br><br>
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" class="form-control" id="end_date" placeholder="End Date" style="width: 60%; display:inline">

        {{-- <a style="display: inline-block" href="javascript:void(0);" class="add_button btn-success" title="Add field">+Click to Add</a> --}}
    </div>
</div>
<br>
{{-- <br> --}}

<div class="field_wrapper">

</div>
<button type="button" id="addmoreitems" class="btn btn-primary">Add More Items</button>

</form>
<button type="button" id="getquestions" class="btn btn-primary">Next</button>
<script>
// $(document).ready(function(){
//     // document.getElementById("edName").attributes["required"] = "";

//     // var maxField = 10; //Input fields increment limitation
//     var addButton = $('.add_button'); //Add button selector
//     var wrapper = $('.field_wrapper'); //Input field wrapper
//     var fieldHTML = '<div ><br><input type="text" name="inspection_items[]" class="form-control" id="inspection_items" placeholder="Inspection Items" style="width: 60%; display:inline"><br><br><input type="file" name="inspection_image[]" class="form-control" id="inspection_items" placeholder="Inspection Items" style="width: 60%; display:inline"><br></div>';
//     // var x = 1; //Initial field counter is 1

//     //Once add button is clicked
//     $(addButton).click(function(){
//         //Check maximum number of input fields
//         // if(x < maxField){
//             // x++; //Increment field counter
//             $(wrapper).append(fieldHTML); //Add field html
//         });
//     });
$(document).ready(function(){
  $('#addmoreitems').click(function(){
    // alert("The paragraph was clicked.");
    add_more_items();
  });
});

$(document).ready(function(){
  $('#getquestions').click(function(){
    // alert("The paragraph was clicked test.");
    get_question();
  });
});
    function get_question(){
    //     var task_id = document.getElementById("task_id").value;
    //     var inspection_items = document.getElementById("inspection_items").value;
    // // var arr = $('input[name="inspection_items[]"]').map(function () {
    // // return this.value; // $(this).val()
    // // }).get();
    // $.ajax({
    //             url: "/ajax_items",
    //             type: "POST",
    //             data: {
    //                 '_token': '{{ csrf_token() }}',
    //                 // 'items': arr,
    //                 'inspection_items': inspection_items,
    //                 'task_id': task_id,

    //             },
    //             cache: false,
    //             success: function(result){
    //                 $("#main-div").html(result);
    //                 // submitfilter();
    //             }
    //         });

    var task_id = document.getElementById("task_id").value;
            // var task_id = 5;
            var inspection_items = document.getElementById("inspection_items").value;
            var start_date = document.getElementById("start_date").value;
            var end_date = document.getElementById("end_date").value;
            // var photo = document.getElementById("inspection_image").value;

            let photo = $('#inspection_image')[0].files[0];
            let formimage = new FormData();
            // let csrf = {{ csrf_token() }};
            formimage.append('inspection_image', photo);
            formimage.append('inspection_items', inspection_items);
            formimage.append('task_id',task_id);
            formimage.append('start_date',start_date);
            formimage.append('end_date',end_date);
            // formimage.append('_token', csrf_token());
            // let formimage = new FormData();
            // formimage.append("file", inspection_image.files[0]);
            // $.ajax({
            //     url: "/ajax_more_items",
            //     type: "POST",
            //     data: {
            //         '_token': '{{ csrf_token() }}',
            //         'inspection_items': inspection_items,
            //         'inspection_image': formimage,
            //         'task_id': task_id,

            //     },
            //     cache: false,
            //     success: function(result){
            //         $("#main-div").html(result);
            //         // submitfilter();
            //     }
            // });

            $.ajax({
                url: "/ajax_items",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                data: formimage,
                contentType: false,
                processData: false,
                cache: false,
                success: function(result){
                    $("#main-div").html(result);
                    // submitfilter();
                }
            });

        }

        function add_more_items(){
            var task_id = document.getElementById("task_id").value;
            // var task_id = 5;
            var inspection_items = document.getElementById("inspection_items").value;
            var start_date = document.getElementById("start_date").value;
            var end_date = document.getElementById("end_date").value;
            // var photo = document.getElementById("inspection_image").value;

            let photo = $('#inspection_image')[0].files[0];
            let formimage = new FormData();
            // let csrf = {{ csrf_token() }};
            formimage.append('inspection_image', photo);
            formimage.append('inspection_items', inspection_items);
            formimage.append('task_id',task_id);
            formimage.append('start_date',start_date);
            formimage.append('end_date',end_date);
            // formimage.append('_token', csrf_token());
            // let formimage = new FormData();
            // formimage.append("file", inspection_image.files[0]);
            // $.ajax({
            //     url: "/ajax_more_items",
            //     type: "POST",
            //     data: {
            //         '_token': '{{ csrf_token() }}',
            //         'inspection_items': inspection_items,
            //         'inspection_image': formimage,
            //         'task_id': task_id,

            //     },
            //     cache: false,
            //     success: function(result){
            //         $("#main-div").html(result);
            //         // submitfilter();
            //     }
            // });

            $.ajax({
                url: "/ajax_more_items",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                data: formimage,
                contentType: false,
                processData: false,
                cache: false,
                success: function(result){
                    $("#main-div").html(result);
                    // submitfilter();
                }
            });
        }

    </script>

