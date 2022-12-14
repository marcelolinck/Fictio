/* import './globalstyles.scss';
import './tailwind.css' */
import React from 'react';
import ReactDOMServer from 'react-dom/server';
import { createInertiaApp } from '@inertiajs/inertia-react';
import createServer from '@inertiajs/server';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
/* import route from '../../vendor/tightenco/ziggy/dist/index.m'; */
import Layout from './components/Layout/Layout';

const appName = 'Laravel';

createServer((page) =>
    createInertiaApp({
        page,
        render: ReactDOMServer.renderToString,
        title: (title) => `${title} - ${appName}`,
        resolve: (name) => resolvePageComponent(`./${name}.tsx`, import.meta.glob('./**/*.tsx')),
        setup: ({ App, props }) => {
            global.route = (name, params, absolute) =>
                route(name, params, absolute, {
                    ...page.props.ziggy,
                    location: new URL(page.props.ziggy.location),
                });

            return (
            <Layout>
                <App {...props}/>
            </Layout>
            );
        },
    })
);
