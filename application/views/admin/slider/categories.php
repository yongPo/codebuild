<style type="text/css">
    #categories-table tbody tr{
        height: 63px;
    }
</style>
<div class="container-fluid">
    <div class="block-header">
        <h2>
            <?= $title; ?>
        </h2>
    </div>
    <!-- Basic Examples --><?php $attributes = array('id' => 'add-category'); ?>
    <?= form_open_multipart('cb-admin/category/save', $attributes); ?>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    	<h5>Add New Category</h5>
                    </div>
                    <div class="body">
                        <label>Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" value="" placeholder="" autofocus>
                            </div>
                        </div>
                        <label>Slug</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="slug" value="" placeholder="">
                            </div>
                        </div>
                        <div class="p-t-5">
                            <label>Parent Category</label>
                            <select class="form-control show-tick" name="parent-category">
                                <option value="">None</option>
                                <?php foreach ($contents as $content): ?>
                                    <option value="<?= $content->name; ?>"><?= $content->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group p-t-30">
                            <label>Description</label>
                            <div class="form-line">
                                <textarea class="form-control" name="desc" value="" placeholder=""></textarea>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="categoryType" value="category-slider">
                            <input type="hidden" name="categoryId" value="">
                            <button type="submit" class="btn btn-primary waves-effect add-btn">Add New Category</button>
                            <button type="submit" class="btn btn-primary waves-effect edit-btn visible-print">Update Category</button>
                            <button type="button" class="btn btn-danger waves-effect cancel-btn pull-right visible-print">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                 <div class="card">
                    <div class="header">
                        
                    </div>
                    <div class="body">
                         <table id="categories-table" data-source="<?php echo base_url("cb-admin/category/datatable/slider") ?>" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th width="50%">Name</th>
                                    <th width="25%">Slug</th>
                                    <th width="25%">Count</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Count</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <!--?php foreach ($contents as $content): ?>
                                    <tr height="60px">
                                        <td>
                                            <!?php echo $content->name ?> <br>
                                            <small><a href="<!?php echo base_url() . 'cb-admin/edit/page/' . $content->id; ?>">Edit</a> | <a href="javascript:void(0);">Quick Edit</a> | <a href="javascript:void(0);">View</a></small>
                                        </td>
                                        <td><!?= empty($content->description) ? '' : $content->description; ?></td>
                                        <td>
                                            <!?= $content->term_slug; ?>
                                        </td>
                                        <td>
                                            1
                                        </td>
                                    </tr>
                                <!-?php endforeach; ?-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    <?= form_close(); ?>
</div>