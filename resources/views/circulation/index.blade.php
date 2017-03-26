@extends('layouts.master')

@section('content')


    <div class="content" style="height:950px;background-color:white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <br>
                       <div class="container" id="CirculationVue">
                        <button class='btn btn-primary btn-sm pull-right'  @click.prevent="addItem()"><i class="fa fa-plus"></i> Issue Book</button>

                                <table class="table table-bordered">
                                <tr>
                                    <th>Book</th>
                                    <th>Borrowed By</th>
                                    <th>Issue date</th>
                                    <th>Due date</th>

                                </tr>
                                <tr v-for="item in items">
                                    <td> @{{ item.book_id}}</td>
                                    <td> @{{ item.person_id }}</td>
                                    <td>@{{ item.issue_date }}</td>
                                    <td>@{{ item.due_date }}</td>

                                </tr>
                            </table>

                            <!-- issue book Modal -->
                            <div class="modal fade" id="issueBook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel"> Issue Book</h4>
                                  </div>
                                  <div class="modal-body">

                                       <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">

                                         <div class="form-group">
                                            <label for="name">Isbn :</label>
                                            <input type="text" name="isbn" class="form-control" v-model="newItem.isbn" />
                                            <span v-if="formErrors['isbn']" class="error text-danger">@{{ formErrors['isbn'] }}</span>
                                         </div>

                                          <div class="form-group">
                                            <label for="name">Issue date:</label>
                                            <input type="text" name="issueDate" class="form-control" v-model="newItem.issueDate" />
                                            <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'] }}</span>
                                         </div>
                                         <div class="form-group">
                                            <label for="name">Due date:</label>
                                            <input type="text" name="dueDate" class="form-control" v-model="newItem.dueDate" />
                                            <span v-if="formErrors['dueDate']" class="error text-danger">@{{ formErrors['dueDate'] }}</span>
                                         </div>
                                         <div class="form-group">
                                            <label for="name">Borrower Id</label>
                                            <input type="text" name="personId" class="form-control" v-model="newItem.personId" />
                                            <span v-if="formErrors['personId']" class="error text-danger">@{{ formErrors['personId'] }}</span>
                                         </div>
                                          <div class="form-group">
                                            <button type="submit" class="btn btn-success">Add</button>
                                          </div>

                                        </form>
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                  </div>
                                </div>
                              </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


 <script type="text/javascript" src="{{ URL::asset('/js/vueJs/circulation.js') }}"></script>

@endsection
