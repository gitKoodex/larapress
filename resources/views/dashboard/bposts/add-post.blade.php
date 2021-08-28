<?php
    use Illuminate\Support\Facades\Auth;
?>
@section('extracss')
    <link rel="stylesheet" href="{{asset('/dashboard/css')}}/mdtimepicker.min.css">
    <link rel="stylesheet" href="{{asset('/dashboard/css')}}/jquerysctipttop.css">
    <link rel="stylesheet" href="{{asset('/dashboard/css')}}/summernote.css">

@endsection

@section('extrajs')
    <script src="{{asset('/dashboard/js')}}/mdtimepicker.min.js"></script>
    <script src="{{asset('/dashboard/js')}}/mdtimepicker-init.js"></script>
    <script src="{{asset('/dashboard/js')}}/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
          var summernote = document.getElementById("summernote");
            // var summernote = $(".summernote");

            $('#summernote').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function(files, editor, welEditable) {
                        sendFile(files[0], editor, welEditable);
                    }
                }
            });

            function sendFile(file, editor, welEditable) {
                var path="<?=url("/")."/reports/get-report-img"?>";
                    console.log(path);
                data = new FormData();
                data.append("file", file);
                data.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    data: data,
                    type: "POST",
                    url: path,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        console.log(url);
                        var imgNode =document.createElement('img');
                        var src= URL.createObjectURL(file);
                        imgNode.setAttribute("src",src);
                        $(summernote).summernote('insertNode', imgNode);
                    }
                });
            }
            $("#add-report").on("click",function (){
                var path="<?=url("/")."/reports/restor-report"?>";
                console.log(path);
                data = new FormData();
                data.append("start", $("#timepicker").val());
                data.append("end", $("#timepickerExit").val());
                data.append("report_content",  $('#summernote').summernote('code'));
                data.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    data: data,
                    type: "POST",
                    url: path,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        console.log(url);
                    }
                });
            });
        });

    </script>


@endsection
<x-dashboardheader />



<!--Main Navigation-->
<div class="containerfluid px-3 bg-black">
    <div class="row">
        <x-dashboardside/>
        <div class="col-10 col-md-10 p-0 bg-gray">
            <main class="tab-content" id="A" style="margin-top: 58px">
                <div class="tab-content" id="myTabContent0">
                    <header>
                        <div class="help-container">
                            <!-- Collapsed content -->
                            <div class="collapse mt-3 bg-black border-thin border-gold p-3" id="collapseExample">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident.
                            </div>
                            <!-- Buttons trigger collapse -->
                            <a class="btn btn-black has-arrow-up" data-mdb-toggle="collapse"  href="#collapseExample" role="button" aria-expanded="false"  aria-controls="collapseExample">
                                تنضیمات صفحه
                                <i class="fas fa-angle-up"></i>
                            </a>
                            <button class="btn btn-black has-arrow-up" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                               راهنما
                                <i class="fas fa-angle-up"></i>
                            </button>
                        </div>
                    </header>
                </div>
                <section id="addPostmainContent">
                <div class="col-10 col-md-10 p-0 bg-gray">
      
            <div class="container-fluid">
                <div class="card my-3 p-3">
                    @php
                        if(Auth::check()){
                    @endphp
                   <small>
                        سلام آقا/خانم {{Auth::user()->name}} خوش آمدید.
                    </small>
                    @php
                       }
                    @endphp
                        <h4 class="card-title p-3">{{$page_title}}</h4>

                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <div class="page-titles ltr">
                            <ol class="breadcrumb justify-content-start">
                                <?php
                                $a = request()->path();
                                $a = explode("/", $a);
                                $length = count($a);
                                $length--;
                                $i = 0;
                                ?>
                                @foreach($a as $bred)
                                    <li class="breadcrumb-item @if($i==$length) {!! 'active' !!} @endif">
                                        <a href="javascript:void(0)">{{$bred}}</a>
                                    </li>
                                    @php
                                        $i++
                                    @endphp
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{$page_description}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row py-3">
                                    <div class="col-12 col-md-4">
                                        <p>
                                            گزارش کار
                                            <span class="user-name">
                                                      <?php
                                                if (Auth::check()) {
                                                    echo Auth::user()->name;
                                                }
                                                ?>
                                             </span>
                                            <span>
                                                روز
                                            </span>
                                            <span class="persian-date-txt">
                                               {!! parsi_date("l","now") !!}
                                                {{parsi_date("Y/m/d","now")}}
                                                {{faDateToTimestamp(parsi_date("Y/m/d","now"))}}
                                                {{whichPartUrl(request()->path(),1)}}
                                             </span>
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="d-flex justify-content-end">
                                            <p class="pr-1">
                                                ساعت ورود:
                                            </p>
                                            <input type="text" id="timepicker" class="form-control get-time-input timepicker-start"
                                                   value="9:00 AM"/>
                                            <p class="px-1">
                                                ساعت خروج:
                                            </p>
                                            <input type="text" id="timepickerExit" class="form-control get-time-input timepicker-end"
                                                   value="6:00 PM"/>
                                        </div>

                                    </div>
                                </div>
                                <form action="{{route('posts.store')}}" method="POST">
                                @csrf
                                {!!  hidden('user_id','1') !!}
                                <input type="text" value="mahallo" name="url" id="url" class="ltr text-left form-control">
                                {{-- تست ادیتوز --}}
                                <div class="summernote" id="summernote"></div>
                                {!! submit_btn("success",whichPartUrl(request()->path(),1),$page_description) !!}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </section>
            </main>
        </div>
    </div>
</div>
<!--Main layout-->

<!--Main layout-->
<!-- MDB -->
<x-dashboardfooter/>

