export default theme => ({
    view: {
        maxWidth: 900,
        margin: 'auto',
        paddingBottom: 75,
    },
    grow: {
        flexGrow: 1,
    },
    para: {
        // border: '1px solid rgba(255,255,255,0.8)',
        paddingTop: theme.spacing(),
        paddingBottom: theme.spacing(),
    },
    confirmSizer: {
        minWidth: 360,
    },
    primaryColor: {
        color: theme.palette.primary.main,
    },
    fabButtonBottom: {
        position: 'absolute',
        zIndex: 1,
        top: -30,
        left: 0,
        right: 0,
        margin: '0 auto',
    },
});
