<!-- This is use for ajax response, we are using hanldebars -->

<!--Because blade and hanldebars, they both use brackets { { } }, We need to use @ as prefix to make 
    blade ignore the content, but handlebar no
    If we need to write some blade stuff like the form, we can use the normal php style '< ? = ? >' so in that way we don't
    mess with handlebar syntax, and yeah, inse php we can use normal handlebar syntax without the necesity of @ -->
    
<script id="riskProkectFiltered" type="text/x-handlebars-template">
   <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Description</td>
                <td>Risk</td>
                <td>Project</td>
                <td>Probabilty</td>
                <td>Impact</td>
            </tr>
        </thead>
        <tbody>
            @{{#each this}}
            <tr>
                <td>@{{ risk_project_id }}</td>
                <td>@{{ description}}</td>
                <td>@{{ risk_id }}</td>
                <td>@{{ project_id }}</td>
                <td>@{{ probability }}</td>
                <td>@{{ impact }}</td>
                <td>
                <?= Form::open(array('url' => 'riskProject/{{ risk_project_id }}' , 'class' => 'pull-right')) ?>
                     <?= Form::hidden('_method', 'DELETE') ?>
                     <?= Form::submit('Delete this riskproject', array('class' => 'btn btn-warning')) ?>
                <?= Form::close() ?>
                <a class="btn btn-small btn-success" href="<?= URL::to('/riskProject/{{ risk_project_id }}') ?>">Show this riskproject</a>
                <a class="btn btn-small btn-info" href="<?= URL::to('riskProject/{{ risk_project_id }}/edit') ?>">Edit this Nerd</a>
               
                </td>
            </tr>
            @{{/each}}
        </tbody>
    </table>
</script>