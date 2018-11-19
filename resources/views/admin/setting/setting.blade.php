@extends('admin.header')
@section('title',  'Setting')
@section('content')
    <div class="page-content">

    @include('admin.error')

    <!-- Modal -->
        <div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="formAddMenu" method="POST" action="{{ route('setting.update') }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="addMenuModalLabel">Add Menu</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="ex: Tentang Kami" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Url</label>
                                <input type="text" name="url" placeholder="ex: tentang-kami" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- BEGIN MAIN CONTENT -->
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#menu" aria-controls="menu" role="tab"
                                                                          data-toggle="tab">Menu</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="menu">
                                    <!-- Button trigger modal -->
                                    <div style="margin-bottom: 1rem">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#addMenuModal">
                                            Add Menu
                                        </button>
                                    </div>
                                    <i>Drag the item from Navigation List to Active Navigation to Activate the Menu</i>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4>Navigation List</h4>
                                                <ul class="list-group sortable available-nav">
                                                    @foreach($navs as $nav)
                                                        <li class="list-group-item" data-id="{{ $nav->id }}"
                                                            data-name="{{ $nav->name }}" data-url="{{ $nav->url }}"
                                                            data-parent="">
                                                            <div class="sortable-title">
                                                                <span><i class="fa fa-arrows" aria-hidden="true"></i>
                                                                    {{ $nav->name }}</span>
                                                                @if($nav->type == 'navs_list')
                                                                    <button class="btn btn-danger btn-remove-nav"
                                                                            style="float: right;"
                                                                            data-nav="{{ $nav->id }}">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                            <ul class="list-group sortable"></ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <form class="col-md-6" method="POST" id="formMenu">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <div class="form-group">
                                                <h4>Active Navigation</h4>
                                                {!! $active !!}
                                            </div>
                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->

    </div><!-- END PAGE CONTENT -->
@endsection

@push('css')
    <style>
        .sortable-title {
            display: block;
            min-height: 50px;
        }

        .sortable-title span {
            line-height: 50px;
        }

        .sortable {
            background-color: #f7f7f7;
            min-height: 30px;
            position: relative;
        }

        .sortable::before {
            content: 'Drop Here';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .list-group-item {
            cursor: grab;
        }
    </style>
@endpush
@push('js')
    <script>
        $(function () {
            $(".sortable").sortable({
                connectWith: ".sortable",
                dropOnEmpty: true,
                items: "li.list-group-item",
                cursor: "grabbing",
                stop: function (event, ui) {
                    let item = ui.item
                    let parent = item.parent().parent()

                    if (parent.hasClass('list-group-item')) {
                        console.log(parent.data('id'))
                        item.data('parent', parent.data('id'))
                    } else {
                        item.data('parent', null)
                    }
                },
            }).disableSelection();

            $('#formMenu').on('submit', function (e) {
                e.preventDefault()

                let items = $('#formMenu .list-group-item')

                let data = []
                items.each(function (key, item) {
                    data.push({
                        id: $(item).data('id'),
                        name: $(item).data('name'),
                        url: $(item).data('url'),
                        parent: $(item).data('parent'),
                    })
                })

                $.ajax({
                    url: '{{ route('setting.update') }}',
                    method: 'POST',
                    data: {
                        data: {
                            'navs_active': data
                        },
                        _token: '{{ csrf_token() }}',
                        _method: 'PATCH'
                    }
                }).done(function (res) {
                    location.reload()
                })
            })

            $('#formAddMenu').submit(function (e) {
                e.preventDefault()

                let name = $('[name="name"]').val()
                let url = $('[name="url"]').val()

                let navs = {!! collect(\App\Setting::where('meta_key', 'navs_list')->first()->value) !!}

                navs.push({
                    name: name,
                    url: url,
                })

                let id = navs.length

                $.ajax({
                    method: 'POST',
                    url: '{{ route('setting.update') }}',
                    data: {
                        data: {
                            navs_list: navs
                        },
                        _method: 'PATCH',
                        _token: '{{ csrf_token() }}'
                    }
                }).done(function (result) {
                    location.reload()
                })
            })

            $('.btn-remove-nav').click(function () {

                let id = $(this).data('nav')

                let parent = $(this).parent().parent()

                let name = $('[name="name"]').val()
                let url = $('[name="url"]').val()

                let navs = {!! collect(\App\Setting::where('meta_key', 'navs_list')->first()->value) !!}

                navs.splice(id, 1)

                $.ajax({
                    method: 'POST',
                    url: '{{ route('setting.update') }}',
                    data: {
                        data: {
                            navs_list: navs
                        },
                        _method: 'PATCH',
                        _token: '{{ csrf_token() }}'
                    }
                }).done(function (result) {
                    location.reload()
                })
            })
        });
    </script>
@endpush