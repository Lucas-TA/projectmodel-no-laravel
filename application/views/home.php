<?php $this->layout('default', ['title' => $title]) ?>
<h2> Users </h2>
<div x-data="users()" x-init="loadUsers()">
    <ul>
        <template x-for="user in data" :key="user.id">
            <li x-text="user.lastName"></li>
        </template>
    </ul>
</div>

<ul class="users-home">
    <?php foreach($users as $user): ?>
        <li><?php echo $user->firstName ?> | <a href="/user/<?php echo $user->id; ?>">Details</a> </li>
    <?php endforeach; ?>
</ul>