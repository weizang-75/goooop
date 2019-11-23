import React, { Component } from 'react';
import cn from 'classnames';
import { withStyles } from '@material-ui/core/styles';
import commonStyles from "../theme/commonStyles";
import {
    CssBaseline
} from '@material-ui/core/';
import Goooop from '../graphics/Goooop';

export const styles = theme => ({
    ...commonStyles(theme),
    reactJumbotron: {
        position: 'relative',
        zIndex: 1230000,
        height: '100vh',
        width: '100%',
        left: 0,
        top: 0,
        overflow: 'hidden',
        background: '#42949F'
    }
});


class ReactJumbotron extends Component {
    componentDidMount() {
        const wordpressDiv = document.getElementById('wordpress');
        if (wordpressDiv) {
            // wordpressDiv.style.display = 'none';
        }
    }
    render() {
        const {
            classes,
        } = this.props;
        const { reactJumbotron } = window;
        const { title } = reactJumbotron;
        return (
            <div className={cn(classes.reactJumbotron)}>
                <CssBaseline />
                <Goooop
                    title={title}
                    style={{
                        position: 'relative'
                    }} />
            </div>
        );
    }
}

export default withStyles(styles, { withTheme: true })(ReactJumbotron);