<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12">
                <div class="card proj-progress-card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <h6>{{ $title }}</h6>
                                <h5 class="m-b-30 f-w-700">{{$mainDigit}}<span class="text-c-green m-l-10">{{$percent}}%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-c-red" style="width:{{$quantityFromOneHundred}}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
