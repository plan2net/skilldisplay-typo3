
plugin.tx_blog_posts {
    view {
        # cat=plugin.tx_blog_posts/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:blog/Resources/Private/Templates/
        # cat=plugin.tx_blog_posts/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:blog/Resources/Private/Partials/
        # cat=plugin.tx_blog_posts/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:blog/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_blog_posts//a; type=string; label=Default storage PID
        storagePid =
    }
}
