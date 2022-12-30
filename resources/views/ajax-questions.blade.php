<div class="form-group">
    <label for="exampleInputPassword1">Inspection Items Questions</label>
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
        {{-- <input type="text" name="inspection_item_id" class="form-control" id="inspection_items" placeholder="Inspection Items" style="width: 60%; display:inline"> --}}
        <select name="inspection_item_id" class="form-control" id="inspection_item_id" placeholder="Inspection Items" style="width: 60%; display:inline">
        @foreach ($inspection_items as $item)
            <option value="{{$item->id}}">{{$item->i_title}}</option>
        @endforeach
        </select>
        <br><br>
        <input type="text" name="question" class="form-control" id="question" placeholder="Question" style="width: 60%; display:inline">
        {{-- <input type="hidden" name="task_id" class="form-control" id="status" placeholder="Question" style="width: 60%; display:inline"> --}}

        {{-- <a style="display: inline-block" href="javascript:void(0);" class="add_button btn-success" title="Add field">+Click to Add</a> --}}
    </div>
</div>
<br>
{{-- <br> --}}

<div class="field_wrapper">

</div>
<button type="button" onclick="next_items()" class="btn btn-primary">Add More Questions</button>
<button type="button" onclick="finish()" class="btn btn-primary">Submit</button>
</form>
<script>
function finish(){
        // $("form").submit();
        // document.getElementById("inspection_item_id").required = true;
        // document.getElementById("question").attributes["required"] = "";
        // document.getElementById("client_name").attributes["required"] = "";
        // document.getElementById("description").attributes["required"] = "";
        // document.getElementById("status").attributes["required"] = "";

        var inspection_item_id = document.getElementById("inspection_item_id").value;
        var question = document.getElementById("question").value;
        var task_id = document.getElementById("task_id").value;
        // var description = document.getElementById("description").value;
        // var status = document.getElementById("status").value;
        // var title = document.getElementById("title").value;
        if(!inspection_item_id || !question){
            // console.log("yes");
            alert("Fill the Fields");
        }else{
            // console.log(title);

        $.ajax({
                url: "/ajax_question",
                type: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'inspection_item_id': inspection_item_id,
                    'question': question,
                    'task_id': task_id
                    // 'description': description,
                    // 'status': status
                },
                cache: false,
                success: function(result){
                    $("#main-div").html(result);
                    // submitfilter();
                }
            });
        }
    }

    function next_items(){
        // $("form").submit();
        // document.getElementById("inspection_item_id").required = true;
        // document.getElementById("question").attributes["required"] = "";
        // document.getElementById("client_name").attributes["required"] = "";
        // document.getElementById("description").attributes["required"] = "";
        // document.getElementById("status").attributes["required"] = "";

        var inspection_item_id = document.getElementById("inspection_item_id").value;
        var question = document.getElementById("question").value;
        var task_id = document.getElementById("task_id").value;
        // var description = document.getElementById("description").value;
        // var status = document.getElementById("status").value;
        // var title = document.getElementById("title").value;
        if(!inspection_item_id || !question){
            // console.log("yes");
            alert("Fill the Fields");
        }else{
            // console.log(title);

        $.ajax({
                url: "/ajax_more_question",
                type: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'inspection_item_id': inspection_item_id,
                    'question': question,
                    'task_id': task_id
                    // 'description': description,
                    // 'status': status
                },
                cache: false,
                success: function(result){
                    $("#main-div").html(result);
                    // submitfilter();
                }
            });
        }
    }

    </script>
