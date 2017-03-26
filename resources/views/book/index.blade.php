@extends('layouts.master')

@section('content')


    <div class="content" style="height:950px;background-color:white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <br>
                       <div class="container" id="BookVue">
                        <button class='btn btn-primary btn-sm pull-right'  @click.prevent="addItem()"><i class="fa fa-plus"></i></button>

                                <table class="table table-bordered">
                                <tr>

                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th width="200px">Action</th>
                                </tr>
                                <tr v-for="item in items">

                                    <td> <a @click.prevent="listBooks(item)">@{{ item.name }}</a></td>
                                     <td>@{{ item.created_at }}</td>
                                      <td>@{{ item.updated_at }}</td>
                                    <td>
                                      <button class="btn btn-primary" @click.prevent="editItem(item)"><i class="fa fa-edit"></i></button>
                                      <button class="btn btn-danger" @click.prevent="deleteItem(item)"><i class="fa fa-trash-o"></i></button>
                                      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                    </td>
                                </tr>
                            </table>

                            <!-- Add Book Modal -->
                            <div class="modal fade" id="createBook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Add Book</h4>
                                  </div>
                                  <div class="modal-body">

                                       <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                                         <div class="form-group">
                                            <label for="name">ISBN:</label>
                                            <input type="text" name="isbn" class="form-control" placeholder="Existing or New " v-model="newItem.isbn" />
                                            <span v-if="formErrors['isbn']" class="error text-danger">@{{ formErrors['isbn'] }}</span>
                                         </div>
                                          <div class="form-group">
                                            <label for="name">Book Name:</label>
                                            <input type="text" name="name" class="form-control" v-model="newItem.name" />
                                            <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'] }}</span>
                                         </div>
                                          <div class="form-group">
                                            <label for="name">Author :</label>
                                            <input type="text" name="author" placeholder="Existing Id or New Name" class="form-control" v-model="newItem.author" />
                                            <span v-if="formErrors['author']" class="error text-danger">@{{ formErrors['author'] }}</span>
                                         </div>
                                         <div class="form-group">
                                            <label for="name">Publisher :</label>
                                            <input type="text" name="publisher" placeholder="Existing Id or New Name" class="form-control" v-model="newItem.publisher" />
                                            <span v-if="formErrors['publisher']" class="error text-danger">@{{ formErrors['publisher'] }}</span>
                                         </div>
                                          <div class="form-group">
                                            <label for="name">Count:</label>
                                            <input type="text" name="count" class="form-control" v-model="newItem.count" />
                                            <span v-if="formErrors['count']" class="error text-danger">@{{ formErrors['count'] }}</span>
                                         </div>
                                          <div class="form-group">
                                            <button type="submit" class="btn btn-success">Add</button>
                                          </div>

                                        </form>

                                  </div>
                                </div>
                              </div>
                            </div>


                        <!-- Edit Category Modal -->
                            <div class="modal fade" id="editBook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Book</h4>
                                  </div>
                                  <div class="modal-body">

                                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">

                                            <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" class="form-control" v-model="fillItem.name" />
                                            <span v-if="formErrorsUpdate['name']" class="error text-danger">@{{ formErrorsUpdate['name'] }}</span>
                                        </div>




                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Save</button>
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


        </div>
    </div>

<script type="text/javascript">var categoryId={!!@$categoryId!!};</script>
<script type="text/javascript" src="{{ URL::asset('/js/vueJs/book.js') }}"></script>

@endsection
