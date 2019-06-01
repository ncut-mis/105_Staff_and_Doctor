@extends('layouts.clinic')


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4>掛號名單</h4>
            <a href="{{ route('register.search') }}"><button class="btn-success">新增掛號</button></a>
            <a href="{{ route('register.late') }}"><button class="btn-success">過號名單</button></a>
        </div>
        <div class="container-fluid">
            <div class="card">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="50px" style="text-align:center"></th>
                        <th width="125px" style="text-align:center">會員</th>
                        <th width="150px" style="text-align:center">看診醫生</th>
                        <th width="125px" style="text-align:center">時段</th>
                        <th width="125px" style="text-align:center">號碼</th>
                        <th style="text-align:center">備註</th>
                        <th width="150px">取消掛號</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registers as $register)
                        @foreach($sections as $section)
                            @foreach($members as $member)
                                @if($register->section_id===$section->id)
                                    @if($register->member_id===$member->id)
                                        @if($register->status === 0)
                                            <tr>
                                                <th style="text-align:center"></th>
                                                <th style="text-align:center">{{$member->name}}</th>
                                                <th style="text-align:center">{{$section->name}}</th>
                                                <th style="text-align:center">{{$section->start}}</th>
                                                <th style="text-align:center">{{$register->reservation_no}}</th>
                                                <th>{{$register->note}}</th>
                                                <th><form action="{{ route('register.index.destroy',$register->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn-secondary">Cancel</button></form></th>
                                            </tr>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4>今日預約名單</h4>

        </div>
        <div class="container-fluid">
            <div class="card">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="50px" style="text-align:center"></th>
                        <th width="125px" style="text-align:center">會員</th>
                        <th width="150px" style="text-align:center">看診醫生</th>
                        <th width="125px" style="text-align:center">時段</th>
                        <th width="125px" style="text-align:center">號碼</th>
                        <th style="text-align:center">備註</th>
                        <th width="150px">轉入掛號</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registers as $register)
                        @foreach($sections as $section)
                            @foreach($members as $member)
                                @if($register->section_id===$section->id)
                                    @if($register->member_id===$member->id)
                                        @if($register->status === -1)
                                            <tr>
                                                <th style="text-align:center"></th>
                                                <th style="text-align:center">{{$member->name}}</th>
                                                <th style="text-align:center">{{$section->name}}</th>
                                                <th style="text-align:center">{{$section->start}}</th>
                                                <th style="text-align:center">{{$register->reservation_no}}</th>
                                                <th style="text-align:center">{{$register->note}}</th>
                                                <th><form action="{{ route('register.index.add_register',$register->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn-secondary"></button>ADD</form></th>
                                            </tr>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>