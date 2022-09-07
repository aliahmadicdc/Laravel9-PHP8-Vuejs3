const context = require.context('../../../base/components', true, /.vue/);

const registerComponents = (app) => {
    context.keys().forEach((file) => {
        const fileName = file.substring(file.lastIndexOf('/') + 1).split('.')[0];

        const componentConfig = context(file)
        app.component(fileName, componentConfig.default || componentConfig)
    });
}

export default registerComponents
