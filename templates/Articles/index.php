<h1>Articles</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <!-- $this->Html: calls CakePHP HtmlHelper. -->
            <!-- link(link_text, link_url) -->
            <!-- url = /view/{slug} -->
            <?= $this->Html->link($article->title,['action'=>'view',$article->slug]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
    </tr>
    <?php endforeach; ?>

    <!-- Insert a link named 'Add Article' that is associated with add(). -->
    <?= $this->Html->link('Add Article',['action'=>'add']) ?>
</table>
