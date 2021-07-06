<h1>Add Article</h1>
<?php
echo $this->Form->create($article);
echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
// show a edit box for title and body
echo $this->Form->control('title');
echo $this->Form->control('body', ['rows' => '3']);
// show a save button.
echo $this->Form->button(__('Save Article'));
echo $this->Form->end();
?>
