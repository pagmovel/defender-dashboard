@extends('artesaos::dashboard.master')
@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-align-justify"></span>
                        {{ trans('artesaos::dashboard.roles.index.heading') }}
                    </h3>
                </div>
                @if (count($roles) > 0)
                    <table class="table table-bordered">
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-primary btn-xs">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="panel-body">
                        <span class="text-danger text-center">
                            <strong>{{ trans('artesaos::dashboard.roles.index.empty') }}</strong>
                        </span>
                    </div>
                @endif
                <div class="pull-right">{!! $roles->render() !!}</div>
            </div>
        </div>
        <div class="col-sm-4" id="add-role-container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ trans('artesaos::dashboard.roles.index.add.heading') }}
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-success" v-show="message">@{{ message }}</div>
                    <form name="addRoleForm" id="addRoleForm" v-on="submit: addRole">
                        <div class="form-group">
                            <label for="role-name">{{ trans('artesaos::dashboard.roles.index.add.label') }}</label>
                            <input type="text" id="role-name" class="form-control" v-model="role.name">
                        </div>
                        <button type="submit" class="btn btn-success ladda-button" data-style="expand-right"
                                v-el="createRoleButton" v-attr="disabled: !role.name">
                            <span class="ladda-label">
                                {{ trans('artesaos::dashboard.roles.index.add.action') }}
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
