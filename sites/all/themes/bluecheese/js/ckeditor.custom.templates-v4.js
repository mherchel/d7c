CKEDITOR.addTemplates( 'default',
{
imagesPath: CKEDITOR_BASEPATH + '../../themes/bluecheese/images/ckeditor/' ,
templates :
    [
        // Changes should also update the filename to bust caches.
        {
            title: 'Note',
            image: 'note.png',
            description: 'Briefly highlight something important',
            html: '<div class="note"><p></p></div>'
        },
        {
            title: 'Tip',
            image: 'note-tip.png',
            description: 'A helpful tip related to content',
            html: '<div class="note-tip"><p></p></div>'
        },
        {
            title: 'Warning note',
            image: 'note-warning.png',
            description: 'Prominent cautionary notice',
            html: '<div class="note-warning"><p></p></div>'
        },
        {
            title: 'Version-specific note',
            image: 'note-version.png',
            description: 'Briefly note a difference for specific versions',
            html: '<div class="note-version"><h4>Specific version(s)</h4><p></p></div>'
        },
        {
            title: 'Core Issue',
            image: 'core-issue.png',
            description: 'Core Template.',
            html: '<h3 id="summary-problem-motivation">Problem/Motivation</h3>' +
            '<p></p><h3 id="summary-proposed-resolution">Proposed resolution</h3>' +
            '<p></p><h3 id="summary-remaining-tasks">Remaining tasks</h3>' +
            '<p></p><h3 id="summary-ui-changes">User interface changes</h3>' +
            '<p></p><h3 id="summary-api-changes">API changes</h3>' +
            '<p></p><h3 id="summary-data-model-changes">Data model changes</h3>' +
            '<p></p>'
        },
        {
            title: 'Core Task',
            image: 'core-tasks.png',
            description: 'Tasks table template.',
            html: '<blockquote>See https://drupal.org/core-mentoring/novice-tasks for tips on identifying novice tasks. Delete or add "Novice" from the Novice? column in the table below as appropriate. Uncomment tasks as the issue advances. Update the Complete? column to indicate when they are done, and maybe reference the comment number where they were done.</blockquote>' +
        '<table><caption>Contributor tasks needed</caption><thead><tr><th>Task</th><th>Novice task?</th><th>Contributor instructions</th><th>Complete?</th></tr></thead><tbody>' +
        '<tr><td>Create a patch</td><td></td><td> <a href="https://drupal.org/contributor-tasks/create-patch">Instructions</a></td><td></td></tr>  ' +
        '<tr><td>Reroll the patch if it no longer applies.</td><td></td><td> <a href="https://drupal.org/contributor-tasks/reroll">Instructions</a></td><td></td></tr> ' +
        '<tr><td>Update the issue summary</td><td></td><td> <a href="https://drupal.org/contributor-tasks/write-issue-summary">Instructions</a></td><td></td></tr> ' +
        ' <tr><td>Update the issue summary noting if allowed during the rc</td><td></td><td> <a href="https://www.drupal.org/node/2592479">Template</a></td><td></td></tr> ' +
        ' <tr><td>Add automated tests</td><td></td><td> <a href="https://drupal.org/contributor-tasks/write-tests">Instructions</a> </td><td></td></tr> ' +
        ' <tr><td>Draft a change record for the API changes</td><td></td><td> <a href="https://drupal.org/contributor-tasks/draft-change-record">Instructions</a></td><td></td></tr>  ' +
        ' <tr><td>Improve patch documentation or standards (for just lines changed by the patch) </td><td>Novice</td><td> <a href="https://drupal.org/contributor-tasks/improve-patch-standards">Instructions</a></td><td></td></tr> ' +
        ' <tr><td>Update the patch to incorporate feedback from reviews (include an <a href="https://www.drupal.org/documentation/git/interdiff">interdiff</a>)</td><td></td><td><a href="https://www.drupal.org/contributor-tasks/create-patch">Instructions</a></td><td></td></tr> ' +
        ' <tr><td>Manually test the patch </td><td>Novice</td><td> <a href="https://drupal.org/contributor-tasks/manual-testing">Instructions</a></td><td></td></tr> ' +
        ' <tr><td>Add steps to reproduce the issue</td><td>Novice</td><td> <a href="https://drupal.org/contributor-tasks/add-steps-to-reproduce">Instructions</a></td><td></td></tr> ' +
        ' <tr><td>Embed before and after screenshots in the issue summary </td><td>Novice</td><td> <a href="https://drupal.org/contributor-tasks/manual-testing">Instructions</a></td><td></td></tr> ' +
        ' <tr><td>Review patch to ensure that it fixes the issue, stays within scope, is properly documented, and follows <a href="https://drupal.org/coding-standards">coding standards</a></td><td></td><td> <a href="https://drupal.org/contributor-tasks/review">Instructions</a></td><td></td></tr>  ' +
        '</tbody></table>'
        }
    ]
});
