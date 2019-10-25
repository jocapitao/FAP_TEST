@extends('admin.tmpl.master')

@section('content')
    <div class="card">
        <div class="card-datatable table-responsive">

            <table id="example" class="datatables-demo table table-striped table-bordered dataTable no-footer"
                   style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created @</th>
                    <th></th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody id="users-body">

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        function templateUsers(res) {
            console.log(res);
            if(res.status === false) {
                alert('Error with data - Contact administrator.');
                return;
            }
            let template = _.template($('#user-entry-template').html());
            $('#users-body').html(template({users: res.content.users}));

            $('#example').dataTable();
        }

        $(function () {
            ajaxRequest(APP_URL + '/get/users', {_token: APP_TOKEN}, 'post', templateUsers)
        });
    </script>
@endsection

@section('templates')
    <script id="user-entry-template" type="text/template">
        <% const user_disabled_style = 'style="color:#fff;" class="bg-dark"' %>
        <% _.each(users, function(user){ %>
            <tr <%= (user.status === 0 ? user_disabled_style : '') %> >
                <td><%= user.name %></td>
                <td><%= user.username %></td>
                <td><%= user.email %></td>
                <td><%= user.inserted_at %></td>
                <td></td>
                <td>
                    <a href="<%= APP_URL %>/get/user/<%= user.id %>" target="_blank" class="btn btn-sm btn-primary">View / Edit</a>
                    <button class="btn btn-sm btn-danger">Remove</button>
                </td>
            </tr>
        <% }); %>
    </script>
@endsection