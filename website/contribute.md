# Contributing

> This document is a work in progress, it may still change, perhaps profoundly.

**Plus** is 100% open source and developed collaboratively by people from all over the world. Even
if you're not a programmer, you can get involved and make a difference.

**Plus** is managed on [GitHub](https://github.com/preprocess/plus).

## Are you a developer?

You may want to propose new features or improvements of existing **Plus** compiler. If you submit
a new feature, please be willing to implement at least some of the code that would be needed to.

Here are the guidelines:

* Please follow the [PSR-12 Coding Style Guide](http://www.php-fig.org/psr/psr-12/), enforced by our linter.
* Ensure that the current tests pass, and if you've added something new, add the tests where relevant. Running the test suite is as simple as: `composer test`.
* Send a coherent commit history, making sure each individual commit in your pull request is meaningful. Typically,
we use the following convention: `type(branch-name): description`. Here are some examples:
    - `feat(add-readonly-properties): add macro`
    - `fix(final-class-with-short-closures): add tests`
    - `chore(improves-linter): improves phpcs config on arrays`
* You may need to [rebase](https://git-scm.com/book/en/v2/Git-Branching-Rebasing) to avoid merge conflicts.
* If you are changing the behavior, or the public API, you may need to update the docs here: [github.com/preprocess/plus/tree/master/website](https://github.com/preprocess/plus/tree/master/website).
* Before sending the pull request, add your changes into the `changelog.md`.
* Finally, please remember that we follow [SemVer](http://semver.org/).

## License

Of course, **Plus** is open-source software licensed under the [MIT license](https://github.com/preprocess/plus/tree/master/license.md).


