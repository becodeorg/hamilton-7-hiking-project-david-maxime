
<a href="/hike?id=<?= $hike['ID']; ?>">
    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $hike['name'] ?></h2>
</a>
<span><?php echo $hike['duration'] ?>min /</span>
<span><?php echo $hike['distance'] ?>km /</span>
<span><?php echo $hike['elevation_gain'] ?>m of elevation</span>
<p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $hike['description']?></p>