import React, { Component } from 'react';
import cn from 'classnames';
import { withStyles } from '@material-ui/core/styles';
import { styles } from '../theme/AppShell.Style';
import {
    // Avatar,
    Grid,
    Card,
    CardHeader,
    CardContent,
    CardMedia,
    Typography,
} from '@material-ui/core/';
const imgSrc = `/jpg/home.jpg`;

class Home extends Component {
    render() {
        const {
            classes,
        } = this.props;
        return (
            <div className={cn(classes.view)}>
                <div className={cn(classes.pad)}>
                    <Card className={cn(classes.card)}>
                        <CardHeader
                            title={`listingslab`}
                            subheader={`JavaScript engineering`}
                        // avatar={(
                        //     <Avatar alt={`home`} className={classes.avatar}>
                        //         <Icon icon={`home`} />
                        //     </Avatar>
                        // )}
                        // action={
                        //     <ViewActions />
                        // }
                        />

                        <CardMedia
                            className={classes.media}
                            image={imgSrc}
                            title={`Home`}
                        />

                        <CardContent>
                            <Typography variant={`body1`}>
                                With over 20 years experience of professional Full Stack JavaScript Web development we are now creating the new breed of mobile app; <a
                                    href={`https://developers.google.com/web/progressive-web-apps`}
                                    target={`_blank`}
                                    title={`What are Progressive Web Apps`}
                                    rel={`noreferrer`}
                                >
                                    Progressive Web Apps
                                </a>.
                                This next gen tech has one codebase compiling to a single app which works on any viewport on any device. It also does not need to be installed via app stores.
                            </Typography>
                        </CardContent>
                    </Card>
                </div>
                <Grid container>
                    {/* {nav.length ?
                        nav.map((item, i) => {
                            // console.log (item);
                            const {
                                label,
                                description,
                                icon,
                                path,
                            } = item;
                            if (path === `/`) {
                                return null;
                            }
                            return (
                                <Grid key={`teaser_${i}`} item xs={12} sm={6} md={4}>
                                    <ViewButton teaser={{
                                        label,
                                        icon,
                                        path,
                                        description,
                                        go: () => {
                                            history.push(path);
                                        }
                                    }} />
                                </Grid>
                            );
                        })
                        : null} */}
                </Grid>
            </div>
        );
    }
}

export default withStyles(styles, { withTheme: true })(Home);
