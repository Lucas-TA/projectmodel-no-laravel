<?php $this->layout('default', ['title' => $title]) ?>
<h2> Users </h2>

<ul class="users-home">
    <?php foreach($users as $user): ?>
        <li><?php echo $user->firstName ?> | <a href="/user/<?php echo $user->id; ?>">Details</a> </li>
    <?php endforeach; ?>
</ul>
<?php $this->start('scripts') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js" integrity="sha512-DdX/YwF5e41Ok+AI81HI8f5/5UsoxCVT9GKYZRIzpLxb8Twz4ZwPPX+jQMwMhNQ9b5+zDEefc+dcvQoPWGNZ3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    axios.defaults.headers = {
        "Content-type":"application/json",
        HTTP_X_REQUESTED_WITH: "XMLHttpRequest",
    }
    async function loadUsers()
    {
        try {
            const {data} = await axios.get('/users');
            console.log(data)
        } catch (error) {
            console.log(error)
        }
    }
    loadUsers()
</script>
<?php $this->stop() ?>