
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><span class="fa fa-map-marker"></span>&nbsp;places</h1>
    </div>
</div>

<!--new place form-->
<div class="row">
    <div class="col-lg-7 col-md-7">
        <label class="form-title"><span class="fa fa-plus"></span>&nbsp;new places</label>

        <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="form-add-new-places">
            <fieldset>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-list">&nbsp;type</i>
                    </span>
                    <select class="form-control"
                            placeholder="Major"
                            id="student_major"
                            >
                        <option value="1000" selected="false">  </option>
                        <?php
                        foreach (dboperation::getPlacesTypes() as $key => $value) {
                            ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span  class="input-group-addon error-mark" >*</span>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;name</i>
                    </span>
                    <input required="" 
                           id="new-place-name"
                           name="new-place-name"
                           type="text"
                           class="form-control"
                           placeholder="place name">
                    <span  class="input-group-addon error-mark" id="new-place-name-error" >*</span>
                </div>


                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;address</i>
                    </span>
                    <input required="" 
                           id="new-place-address"
                           name="new-place-address"
                           type="text"
                           class="form-control"
                           placeholder="place address">
                    <span  class="input-group-addon error-mark" id="new-place-address-error" >*</span>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker">&nbsp;location</i>
                    </span>
                    <input required="" 
                           id="new-place-location-h"
                           name="new-place-location-latitude"
                           type="number"
                           class="form-control"
                           placeholder="Latitude">
                    <input required="" 
                           id="new-place-location-v"
                           name="new-place-location-Longitude"
                           type="number"
                           class="form-control"
                           placeholder="Longitude">
                    <span  class="input-group-addon error-mark" id="new-place-location-h-error" >*</span>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;description</i>
                    </span>
                    <textarea required="" class="form-control" rows="5"></textarea>
                    <span  class="input-group-addon error-mark" id="new-place-location-h-error" >*</span>

                </div>
                <div class="form-group">
                    <label>display status &nbsp;&nbsp;</label>
                    <label class="radio-inline">
                        <input type="radio" name="optionsRadiosInline" id="display-status-true" value="true" checked> true
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="optionsRadiosInline" id="display-status-false" value="false"> false
                    </label>
                </div>


                <input class="btn  btn-success submit-button" type="submit" id="add-new-place" value="Add Place">
            </fieldset>

            <div class="form-message">
                <label id="form-add-new-places-message"></label>
            </div>
        </form>
    </div>
</div>

<hr>

<!--search about place-->
<div class="row">
    <div class="col-lg-7 col-md-7">
        <label class="form-title"><span class="fa fa-search"></span>&nbsp;search</label>
        <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="form-places-search">
            <fieldset>
                <div class="form-group input-group">
                    <input type="text" 
                           required=""
                           id="places-search-key"
                           name="places-search-key"
                           class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </fieldset>
            <div class="form-message">
                <label id="form-places-search-message"></label>
            </div>
        </form>
        <div id="form-places-search-result">

        </div>
    </div>
</div>

<hr>





<div class="row">
    <div class="col-lg-12 col-md-12">
        <label class="form-title"><span class="fa fa-table"></span>&nbsp;places list</label>
        <div class="panel panel-primary">
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>TYPE</th>
                            <th>ADDRESS</th>
<!--                            <th>location Latitude</th>
                            <th>location Longitude</th>-->
                            <th>ACTION</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($index = 0; $index <= 25; $index++) {
                            ?>
                            <tr>
                                <td><?php echo $index; ?></td>
                                <td>gh</td>
                                <td>musevbvbv vbb</td>
<!--                                <td>@mdo</td>
                                <td>Mark</td>-->
                                <td>address</td>
                                <td><span class="btn btn-sm btn-warning">
                                        <span class="fa fa-file-text-o"></span>
                                    </span>
                                    <span class="btn btn-sm btn-primary ">
                                        <span class="fa fa-edit"></span>
                                    </span>
                                    <span class="btn btn-sm btn-danger ">
                                        <span class="fa fa-trash"></span>
                                    </span>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>

                </table>
            </div>
            <div class="panel-footer">
                <center>


                    <nav>
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <?php
                            for ($index = 1; $index <= 20; $index++) {
                                ?>
                                <li <?php echo ($index == 13) ? 'class="active"' : "" ?>><a href="#"><?php echo $index; ?></a></li>
                                <?php
                            }
                            ?>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </center>
            </div>


        </div>
    </div>

</div>




