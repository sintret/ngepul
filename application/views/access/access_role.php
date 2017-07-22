<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>ACCESS ROLE SETTING</strong></h4>
    </header>
    <div class="panel-body">
        <form class="form-horizontal" data-collabel="2" data-label="color" action="<?php echo $action; ?>" method="post">

            <div class="col-md-12" >
                <div class="input-group">
                    <select name="userlevelId" class="form-control" onchange="location.href = '?roleId=' + this.value">
                        <?php
                        $checked = false;
                        foreach ($userlevels as $rsLevel) {
                            $selected = $rsLevel->id==$roleId ? 'selected':'';
                            ?>
                            <option <?php echo $selected;?> value="<?= $rsLevel->id; ?>"><?= $rsLevel->userlevel_name; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span class="input-group-btn">
                        <input type="submit" class="button btn btn-primary" value="save" name="submit" id="mc-embedded-subscribe">
                    </span>
                </div>

            </div>
            <div class="col-md-12">
                <table class="table table-bordered" style="margin-bottom: 10px">
                    <thead>
                        <tr>
                            <th>MENU </th>
                            <th>INDEX <p><input onclick="checkthis('index')" type="checkbox" id="allindex"></p></th>
                            <th>CREATE <p><input onclick="checkthis('create')" type="checkbox" id="allcreate"></p></th>
                            <th>UPDATE <p><input onclick="checkthis('update')" type="checkbox" id="allupdate"></p></th>
                            <th>VIEW <p><input onclick="checkthis('view')" type="checkbox" id="allview"></p></th>
                            <th>DELETE <p><input onclick="checkthis('delete')" type="checkbox" id="alldelete"></p></th>
                            <th>EXCEL <p><input onclick="checkthis('excel')" type="checkbox" id="allexcel"></p></th>
                            <th>WORD <p><input onclick="checkthis('word')" type="checkbox" id="allword"></p></th>
                        </tr>

                    </thead>

                    <tbody align="center">
                        <?php
                        foreach ($controllers as $rsController) {
                            ?>
                            <tr>
                                <td><?= $rsController; ?></td>
                                <?php
                                foreach ($methods as $rsMethod) {
                                    $checked = $modelAccess->accessTo($roleId, $rsController, $rsMethod) ? 'checked="true"' : '';
                                    ?>
                                    <td><input type="checkbox" <?php echo $checked; ?>  name="Role[<?= $rsController; ?>][<?= $rsMethod ?>]" class="<?= $rsMethod; ?>" ></td>

                                    <?php
                                }
                                ?>

                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </form>

</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>function checkthis(elm) {
                                    var cElem = $("#all" + elm);
                                    if (cElem.is(":checked")) {
                                        $("input." + elm).prop("checked", true);
                                    } else {
                                        $("input." + elm).prop("checked", false);
                                    }
                                }</script>