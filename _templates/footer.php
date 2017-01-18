<?php $l10n->set_domain('layout'); ?>
            </main>
            <footer>
                <div>
                    <p>Copyright &copy; <?php echo date('Y'); ?> elementary LLC.</p>
                    <ele-popover>
                        <span slot="trigger"><i class="fa fa-language"></i> Language</span>

                        <div slot="content">
                            <strong>Change Site Language</strong>
                            <ul>
                            <?php foreach ($l10n->list_langs() as $langCode => $langName) {
                                $path = $sitewide['root'].$langCode.$page['path'];
                            ?>
                                <li><a href="<?php echo $path; ?>" rel="alternate" hreflang="<?php echo str_replace('_', '-', $langCode); ?>" data-l10n-off>
                                    <?php echo $langName; ?>
                                </a></li>
                            </ul>
                            <?php } ?>
                        </div>
                    </ele-popover>
                </div>
                <ul>
                    <li><a href="<?php echo $sitewide['root'].'brand'; ?>">Brand</a></li>
                    <li><a href="<?php echo $sitewide['root'].'privacy-policy'; ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo $sitewide['root'].'team'; ?>">Team</a></li>
                    <li><a href="<?php echo $sitewide['root'].'open-source'; ?>">Open Source</a></li>
                </ul>
            </footer>
        </div>
        <?php
            include $template['legacy'];
            $l10n->set_domain('layout');
        ?>
    </body>
</html>
<?php $l10n->end_html_translation();
