<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Document</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

* {
    box-sizing: border-box;
}

.container {
    max-width: 1366px;
}

.header {
    text-align: center;
}

.Tab-list {
    display: flex;
    align-items: center;
    justify-content: center;
    list-style-type: none;
}

.Tab-list li a {
    text-decoration: none;
}

.Tab-list li {
    background-color: lightgray;
    padding: 20px 48px;
    margin: 8px 8px;
}

.Banner-section {
    display: flex;
    align-items: baseline;
    justify-content: space-evenly;
}

.Banner-section li {
    list-style-type: none;
}

.desc {
    display: flex;
    align-items: center;
    margin-right: 50px;
    justify-content: end;
}

.desc li {
    list-style-type: none;
}

.desc span {
    margin-left: 58px;
}

.desc h3 {
    margin-left: 52px;
}

.attachment {
    margin-left: 15rem;

}

.plumbing li {
    list-style-type: none;
}

.plumbing h1 {
    margin-left: 9rem;
}

.paragraph {

}

.paragraph p {


}

.Paragraph-Boxes {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: lightgray;
    margin: 0 10px;
    padding: 20px;
}
.Boxes input{
    width: 30px;
    height: 30px;
}
.paragraph_bottom{
    margin: 0 10px;
    padding: 20px;
    border-left: 1px solid lightgray;
    border-right:  1px solid lightgray;
    border-bottom: 1px solid lightgray;
}
.img_main img{
    width: 300px;
    height: 250px;
}
.img_main{
    display: flex;
    justify-content: space-between;
}
.img_main div{
    border: 1px solid gray;
    padding: 10px 150px;
}
    </style>
</head>

<body>
    <!--start First section---->
    <div class="header">
        <div class="container">
            <h1>Task : {{$task->title ?? ''}}</h1>

            <div class="Tabs">
                <ul class="Tab-list">
                    <li>
                        <a href="#">{{$totalii ?? '0'}}</a><br>Items inspected
                    </li>
                    <li>
                        <a href="#">{{$totaliipass ?? '0'}}</a><br>Pass
                    </li>
                    <li>
                        <a href="#">{{$totaliifail ?? '0'}}</a><br>Fail
                    </li>
                    <li>
                        <a href="#">{{$totaliina ?? '0'}}</a><br>N/A
                    </li>
                    {{-- <li>
                        <a href="#">0</a><br>Neutral
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
    <!--First Section-->

    <!--Second Section--->

    <div class="Banner-section">


        <ul>
            <li>
                <!-- <h3>Type</h3>
                <p>01-Pre-Instllation</p> -->
                <h3>Status</h3>
                <p>
                    @if ($task->status == 0)
                        In Progress
                    @elseif($task->status == 1)
                        Completed
                    @else
                        Under Review
                    @endif
                </p>
            </li>
        </ul>
        <ul>
            <li>
                <h3>Trade</h3>
                <p>
                    @foreach ($users as $user)
                        {{$user->trade ?? ''}}
                    @endforeach
                </p>
                <!-- <h3>Location</h3>
                <p>Basement Level-00</p> -->
            </li>
        </ul>
        <ul>
            <li>
                <!-- <h3>Spec Section</h3>
                <h3>linked Drawings</h3> -->
            </li>
        </ul>

    </div>
    <div class="desc">
        <ul>
            <li>
                <span><b>Description</b></span>
                <span>
                    {{$task->description ?? 'No Description'}}
                </span>
                <!-- <h3>Attachments</h3> -->

            </li>
        </ul>
    </div>
    <!---End second section-->
    <!--Section Inspection Detail-->
    <div class="attachment">
        <h3>Inspection Detail</h3>
    </div>
    @foreach ($inspection_items as $items)


    <div class="Banner-section">
        <ul>
            <li>
                <h3>Inspection Title</h3>
                <p>{{$items->i_title}}</p>
                <h3>Inspection Date</h3>
                <p>{{$items->start_date}}</p>
                <h3>Assignee</h3>
                <p>
                    @foreach ($users as $user)
                        {{$user->name}} ,
                    @endforeach
                </p>

            </li>
        </ul>
        <ul>
            <li>


                {{-- <h3>Assignee</h3>
                <p>Tamara Devas</p> --}}
                <h3>Due Date</h3>
                <p>{{$items->end_date}}</p>
                <h3>Responsible Contractor</h3>
                <p>HTG Engineering</p>

            </li>
        </ul>
        {{-- <ul>
            <li>

                <!-- <h4></h4> -->



            </li>
        </ul> --}}
        {{-- <ul>
            <li>

            </li>
        </ul> --}}

    </div>
    <!-- End Inspection Detail-->


    <!--Plumbing Inspection--->
    <div class="plumbing" >
        <ul>
            <h1>{{$items->i_title}} Question's</h1>
            <li style="text-align: right;">

                @php
                    $ques = App\Models\Question::where('inspection_item_id',$items->id)->get();
                    $quest = $ques->count();
                    $quespasst = $ques->where('q_status','pass')->count();
                    $quesfailt = $ques->where('q_status','fail')->count();
                    $quesnat = $ques->where('q_status','na')->count();
                @endphp

        {{-- <span>O Neutral</span> --}}
        <span>{{$quespasst}} Pass</span>
        <span>{{$quesfailt}} Fail</span>
        <span>{{$quesnat}} N/A</span>
    </li>
</ul>
    </div>


    @foreach ($ques as $q)


     <div  class="Paragraph-Boxes">
    <div class="paragraph">
        <p>{{$q->question}}
        </p>
    </div>
    <div class="Boxes">
        @if ($q->q_status == 'pass')
        <label for="">Pass</label>
        <input checked type="checkbox">
        <label for="">Fail</label>
        <input type="checkbox">
        <label for="">N.A</label>
        <input type="checkbox">
        @elseif ($q->q_status == 'fail')
        <label for="">Pass</label>
        <input type="checkbox">
        <label for="">Fail</label>
        <input checked type="checkbox">
        <label for="">N.A</label>
        <input type="checkbox">
        @else
        <label for="">Pass</label>
        <input type="checkbox">
        <label for="">Fail</label>
        <input type="checkbox">
        <label for="">N.A</label>
        <input checked type="checkbox">
        @endif

    </div>
</div>
{{-- <div style="margin-bottom:20px;" class="paragraph_bottom"><p>Emran Thompson (HTG Engineering) added 4 photos via mobile on 14 jun 2022 at 09.28AM -05</p></div> --}}
    <!--End Plumbing Inspection-->
    {{-- <div class="Paragraph-Boxes">
        <div class="paragraph">
            <p>1.2 All concelead work are left exposed untill Inpection<br>
                Activity:1 Response Change 0 Attachments 0 Photos 0 Comments 0 Obersvations
                </p>
        </div>
        <div class="Boxes">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
        </div>
    </div>

--}}
@php

    $qimages = App\Models\QuestionImage::where('question_id',$q->id)->get();
@endphp

    <div class="paragraph_bottom">
        {{-- <p>Emran Thompson (HTG Engineering) responded with N/A on 14 jun 2022 at 09.26 AM -05</p> --}}
        @foreach ($qimages as $img)


        <div class="img_main">
            <div><img src="{{asset($img->image)}}" alt="No Image Found"></div>
            {{-- <div><img src="image/water-pipes-ground-pit-trench-ditch-during-plumbing-construction-repairing_192985-1968.jpg" alt=""></div> --}}
        </div>
        @endforeach
    </div>
    @endforeach

    @endforeach
</body>

</html>


