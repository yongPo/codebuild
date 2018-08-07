<div class="container-fluid">
        <div class="block-header">
            <h2>
                <?= $title; ?>
                <span class="m-l-10"><a href="<?= base_url(); ?>cb-admin/new/page"><button type="button" class="btn btn-default waves-effect"><i class="material-icons">add</i>Add New</button></a></span>
            </h2>

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    	<p><a href="javascript:void(0);">All(3)</a> | <a href="javascript:void(0);">Published(2)</a> | <a href="javascript:void(0);">Draft(1)</a></p>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="80%">Title</th>
                                        <th width="10%">Author</th>
                                        <th width="10%">Date</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>
                                        	Hello World <br>
											<small><a href="javascript:void(0);">Edit</a> | <a href="javascript:void(0);">Quick Edit</a> | <a href="javascript:void(0);" class="col-red">Trash</a> | <a href="javascript:void(0);">View</a></small>
                                        </td>
                                        <td>admin</td>
                                        <td>
                                        	Published<br>
                                        	2018/07/09
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>