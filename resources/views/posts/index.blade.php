@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            並べ替え
                        </h5>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">いいね</a>
                        <a class="dropdown-item" href="#">投稿日時</a>
                        <a class="dropdown-item" href="#">フォロワー</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            投稿サービスを作ってみました
                        </h5>
                        <p class="card-text">
                            <small class="text-muted">by koba0719 2019/05/22</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            人気タグ
                        </h5>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            ユーザーランキング
                        </h5>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">koba0719</a>
                        <a class="dropdown-item" href="#">bako9313</a>
                        <a class="dropdown-item" href="#">lab392</a>
                        <a class="dropdown-item" href="#">yametarou</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
