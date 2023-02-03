# Nextcloud NBB App

[![PHPUnit GitHub Action](https://github.com/jszeibert/nbb-app/workflows/PHPUnit/badge.svg)](https://github.com/jszeibert/nbb-app/actions?query=workflow%3APHPUnit)
[![Node GitHub Action](https://github.com/jszeibert/nbb-app/workflows/Node/badge.svg)](https://github.com/jszeibert/nbb-app/actions?query=workflow%3ANode)
[![Lint GitHub Action](https://github.com/jszeibert/nbb-app/workflows/Lint/badge.svg)](https://github.com/jszeibert/nbb-app/actions?query=workflow%3ALint)

This is a custom app for the theatre management of the Neue Buehne Bruck in Fuerstenfeldbruck. It is still under heavy development
 
## Try it 
To install it change into your Nextcloud's apps directory:

    cd nextcloud/apps

Then clone this repository into a folder named **nbb**¹:

    git clone https://github.com/jszeibert/nbb-app.git nbb

Then install the dependencies using:

    make composer

¹ It is important that the directory is named exactly like the app ID (see `appinfo/info.xml`).

## Frontend development

The app tutorial also shows the very basic implementation of an app frontend using [Vue.js](https://vuejs.org/). To build the frontend code after doing changes to its source in `src/` requires to have Node and npm installed.

- 👩‍💻 Run `make dev-setup` to install the frontend dependencies
- 🏗 To build the Javascript whenever you make changes, run `make build-js`

To continuously run the build when editing source files you can make use of the `make watch-js` command.
